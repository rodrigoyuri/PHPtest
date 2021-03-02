let inputCepSearch = document.getElementById('search-address')
let buttonSearch = document.getElementById('button-search')

let inputCep = document.getElementById('cep')
let inputCidade = document.getElementById('cidade')
let inputEstado = document.getElementById('estado')
let inputBairro = document.getElementById('bairro')
let inputRua = document.getElementById('rua')
let inputIbge = document.getElementById('ibge')
let alert = document.getElementById('alert-message')

buttonSearch.addEventListener('click', () => {
  this.validateCep(inputCepSearch.value)
})

function getAddress(cep) {
  let xhr = new XMLHttpRequest();
  xhr.open('POST', 'http://localhost/PHPtest/enderecos', true)
  xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded')

  xhr.onreadystatechange = () => {
    if(xhr.readyState == 4 && xhr.status == 200) {
      this.setValuesInputs(xhr.responseText)
    }
  }
  xhr.send(`cep=${cep}`)
}

function validateCep(cep) {
  cep = cep.replace(/\D/g, '');

  if(cep != "") {
    let validate = /^[0-9]{8}$/;

    if(validate.test(cep)) {
      this.getAddress(cep)
      this.showAlert('d-none')
    } else {
      this.formClear()
      this.formAddressClear()
      this.showAlert('d-block')
    }
  } else {
    this.formClear()
    this.formAddressClear()
  }
}

function setValuesInputs(values) {
  address = this.validateValues(values)
  
  inputCep.value = address.cep 
  inputCidade.value = address.localidade
  inputEstado.value = address.uf
  inputRua.value = address.logradouro
  inputIbge.value = address.ibge
  inputBairro.value = address.bairro
  this.formClear()
}

function validateValues(values) {
  jsonValues = JSON.parse(values)
  addressObj = jsonValues.address
  addressArr = Object.entries(addressObj)

  addressArr.map((key, value) => {
    key[1] = (key[1] == "" || Object.keys(key[1]).length == 0) ? "Não encontrado" : key[1]
  })
  
  return Object.fromEntries(addressArr)
}

function formClear() {
  inputCepSearch.value = "";
}

function formAddressClear() {
  inputCep.value = ""
  inputCidade.value = ""
  inputEstado.value = ""
  inputIbge.value = ""
  inputBairro.value = ""
  inputRua.value = ""
}

function showAlert(change) {
  if(change == "d-block") {
    alert.classList.remove('d-none')
    alert.classList.add('d-block')
  }

  if(change == "d-none") {
    alert.classList.remove('d-block')
    alert.classList.add('d-none')
  }
}