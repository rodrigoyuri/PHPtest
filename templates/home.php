<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.2/css/all.css" integrity="sha384-vSIIfh2YWi9wW0r9iZe7RJPrKwp6bG+s9QZMoITbCckVJqGCCRhc+ccxNcdpHuYu" crossorigin="anonymous">
  <link rel="stylesheet" href="<?= url("/templates/assets/css/main.css") ?>">
  <title>Busca de Endereços</title>
</head>

<body>
  <main>
    <div class="container-fluid">

      <div class="row pb-4" style="background-color: #ab66ea;">
        <div class="col-md-12">
          <div class="row d-flex justify-content-center">
            <div class="col-12 mt-3 mb-3">
              <h2 class="font-monospace text-center" style="color: #FFFFFF;">Diga-nos o CEP, que te direis de onde és</h2>
            </div>
          </div>
          <div class="row d-flex justify-content-center">
            <div class="col-4">
              <div class="form-floating">
                <input type="text" class="form-control" id="search-address" placeholder="00000-000">
                <label for="search-address">CEP</label>
              </div>
            </div>
            <div class="col-1 d-flex">
              <button class="btn btn-primary btn-lg" id="button-search">Buscar</button>
            </div>
          </div>
        </div>
      </div>

      <div class="row mt-3">

        <div class="col-md-12">
          <h2 class="text-center">Dados de Endereço</h2>
        </div>

        <div class="row d-flex justify-content-center aling-items-center">
          <div class="col-md-5">
            <div class="alert alert-danger d-none" role="alert" id="alert-message">
              O formato do CEP informado é inválido. Por favor informe um CEP valido <br />
              <span class="fw-bold">Exemplo de CEP válido: 01001-000</span>
            </div>
          </div>
        </div>

        <div class="row g-2 d-flex justify-content-center">
          <div class="col-md-4">
            <div class="form-floating">
              <input type="text" class="form-control" id="cidade" placeholder="São Paulo">
              <label for="cidade">Cidade</label>
            </div>
          </div>
          <div class="col-md-1">
            <div class="form-floating">
              <input type="test" class="form-control" id="estado" placeholder="SP">
              <label for="floatingSelectGrid">Estado</label>
            </div>
          </div>
        </div>

        <div class="row g-2 d-flex justify-content-center">
          <div class="col-md-5">
            <div class="form-floating">
              <input type="text" class="form-control" id="rua" placeholder="Rua Reinado do Cavalo Marinho">
              <label for="cidade">Rua</label>
            </div>
          </div>
        </div>

        <div class="row g-2 d-flex justify-content-center">
          <div class="col-md-3">
            <div class="form-floating">
              <input type="text" class="form-control" id="bairro" placeholder="Ermelino Matarazzo">
              <label for="bairro">Bairro</label>
            </div>
          </div>
          <div class="col-md-2">
            <div class="form-floating">
              <input type="text" class="form-control" id="cep" placeholder="Ermelino Matarazzo">
              <label for="cep">CEP</label>
            </div>
          </div>
        </div>

        <div class="row g-2 d-flex justify-content-center">
          <div class="col-md-5">
            <div class="form-floating">
              <input type="text" class="form-control" id="ibge" placeholder="3531100">
              <label for="ibge">IBGE</label>
            </div>
          </div>
        </div>

      </div>

    </div>
  </main>

  <footer class="fixed-bottom" style="background-color: #ab66ea;">
    <div class="row d-flex justify-content-center">
      <p class="text-center" style="color: #FFFFFF">App Desenvolvido para teste de conhecimento</p>
    </div>
    <div class="row d-flex justify-content-center">
      <div class="col-1"><a href="https://www.linkedin.com/in/rodrigo-yuri/" class="text-decoration-none fs-2" target="_new" style="color: #FFFFFF;"><i class="fab fa-linkedin"></i></a></div>
      <div class="col-1"><a href="https://github.com/rodrigoyuri/" class="text-decoration-none fs-2" target="_new"><i class="fab fa-github" style="color: #FFFFFF;"></i></a></div>
    </div>
  </footer>
  <script src="<?= url("/templates/assets/js/main.js") ?>"></script>
</body>

</html>