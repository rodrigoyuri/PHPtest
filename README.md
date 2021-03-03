# PHPtest

# Sobre o Projeto:

[Demo do Projeto](https://link.para.demo.caso.houver)

O projeto foi desenvolvido com intuito de fazer um teste de conhecimento, ele consisti em um sistema **Web** que consulta uma **API** de endereços através do CEP informado pelo usuário. (para mais detalhes acesse a documentação da [API](https://viacep.com.br/))

O tipo de retorno escolhido para receber da API foi XML, onde no backend é feito um tratamento e salvo alguns dos dados em um banco de dados. 

Após isso caso o usuário venha informar um CEP que já exista na base de dados, o retorno será da base de dados não diretamente da API.

# Tecnologias utilizadas:

## Back end

- PHP
- Composer

## Front end

- HTML
- CSS
- JS
- Bootstrap
- Fontawesome

# Por onde começar:

## Back end

Eu utilizei para o desenvolvimento dessa aplicação o **XAMPP** (link para download [aqui](https://www.apachefriends.org/download.html)), que é uma ferramente bem completa para desenvolvimento com PHP, trazendo com ele o **APACHE**, **MySQL** e o proprio **PHP**. É bem facil de instalar no Windows e no Linux, ele já deixa um ambiente pronto sem você precisar esquentar muito a cabeça com configurações adicionais.

Outra coisa que é muito importante você ter em sua maquina para poder rodar a aplicação é o **Composer** (link para download [aqui](https://getcomposer.org)), ele é um gerenciador de pacotes do PHP e é atráves dele que você pode instalar pacotes de terceiros para auxiliar em seu desenvolvimento.

## IMPORTANTE

**OBS:** É de extrema importancia que você tenha instalado ou utilize na sua maquina o PHP 7.3 ou PHP 7.4, isso devido aos pacotes que são usados no projeto.

Cada pacote tem certas dependecias que devem ser satisfeitas e uma delas é ter instalado ou estar usando o PHP 7.3 ou 7.4.

Minha recomendação é usar o PHP 7.4, foi o que eu usei para desenvolver o sistema e o que eu usei durante outros desenvolvimentos e ate o momento não tive problemas usando ele.

Caso você opte por usar o **XAMPP** nas opções de download tem tanto a versão do PHP 7.3 quanto a versão do PHP 7.4.

## Continuando

Então de forma resumida para testar a aplicação você deve ter:

- O PHP 7.3 ou 7.4 instalado na sua maquina.

- Instalar o Composer.

## Mão na Massa

### Clonando o projeto

Primeiramente clone o projeto na sua maquina onde se encontra seu servidor **APACHE**, como usei o **XAMPP** eu clonei no path C:\xampp\htdocs. Caso opte por usar o **XAMPP** é dentro da pasta htdocs que você deve clonar o projeto.

```bash
git clone https://github.com/rodrigoyuri/PHPtest.git
```

### Instalando as dependencias do projeto

Agora que você ja clonou o projeto, navegue até ele pelo terminar ou prompt de comando e execute o seguinte comando:

```bash
# Entre na pasta do projeto
cd PHPtest

# Instale as dependencias
composer install
```

**OBS:** Lembrando que você deve executar esse comando dentro da pasta do projeto.

Feito isso você ja tem todas as dependencias do projeto instaladas.


### Criando o banco e a tabela

Como não usei nenhum framework para a criação desse projeto, ele não contém migration então a criação tanto do banco quanto da tabela você tem que fazer na mão.

Mals por isso 😅.

Não se preocupe eu ja deixei o script do banco de dados pronto, tudo que você precisa fazer é copiar e colocar o script abaixo em seu banco de dados:

```sql
CREATE DATABASE phptest;

CREATE TABLE address
(
  id INTEGER PRIMARY KEY AUTO_INCREMENT NOT NULL,
  cep VARCHAR(8),
  localidade VARCHAR(255),
  uf VARCHAR(255),
  bairro VARCHAR(255),
  logradouro VARCHAR(255),
  ibge VARCHAR(255)
);
```

**OBS:** Lembrando novamente que esse script é para o banco **MySQL** que vem junto com **XAMPP**.

No caso de quem baixou o **XAMPP** é só executar o software startar os serviço de **APACHE** e **MySQL** e em seu navegador digite o seguinte **http://localhost/phpmyadmin** essa URL vai levar você para o **PhpMyAdmin** onde você pode entrar na aba de **SQL** e executar o script.

Exemplo abaixo:

![PhpMyAdmin](https://github.com/rodrigoyuri/assets-readme/blob/main/PHPtest/phpmyadmin.png)

No caso de quem optou por não usar o **XAMPP**, execute o script sabendo que possivelmente você tenha que fazer alterações nele.

### Configurações do Projeto

**OBS:** Caso você tenha chegado até aqui usando **XAMPP**, não precisa se preocupar pois essas configurações são mais voltadas para quem não utiliza o **XAMPP** ou outro banco de dados que não seja o **MySQL**.

Para aqueles que não usam **XAMPP**, vocês precisam fazer mais uma coisa antes de poder testar o sistema.

Não se preocupe que não é nada complicado ou trabalhoso, são só algumas modificações no arquivo de Config do projeto, então vamos lá.

Abre a pasta do projeto em um editor ou IDE de sua preferência, eu no caso uso o VSCode (link para download [aqui](https://code.visualstudio.com/Download)), então eu posso navegar até o diretório do projeto pelo terminar e usar o comando **code .** para abrir o projeto.

Com o projeto aberto em seu Editor ou IDE, abre a pasta **source** dentro dela teremos a seguinte estrutura:

![Estrutura pasta source](https://github.com/rodrigoyuri/assets-readme/blob/main/PHPtest/estrutura-source.png)

A onde temos de ir é no **Config.php**, abre o arquivo e você se deperará com algo desse tipo:

```php
define("BASE_URL", "http://localhost/PHPtest");

define("DATA_LAYER_CONFIG", [
  "driver" => "mysql",
  "host" => "localhost",
  "port" => "3306",
  "dbname" => "phptest",
  "username" => "root",
  "passwd" => "",
  "options" => [
      PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
      PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
      PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
      PDO::ATTR_CASE => PDO::CASE_NATURAL
  ]
]);

/**
 * Helper
 */
function url(string $uri = null)
{
  if($uri) {
    return BASE_URL . "/{$uri}";
  }

  return BASE_URL;
}
```

Esse como o nome já diz é o arquivo de configuração do projeto, é nele onde configuro as variaveis de conexão, a **BASE_URL** que é uma constante usada no arquivo de rotas do projeto que no caso é o **index.php** e por fim mas não menos importante temos um pequeno **Helper**, uma função para auxiliar no path para arquivos **CSS** e **JS** do projeto.

O que você precisa saber é que dependendo da URL que é formada quando você starta seu **APACHE** a constante **BASE_URL** tem que ter seu valor mudado e caso você use alguma configuração diferente da constante do banco, como por exemplo:

- drive
- port
- user
- password
- host

é aqui eu você deve mudar para ter a aplicação funcionando.

**OBS:** Lembrando que, quem optou por usar o **XAMPP** e seguiu os passos até aqui não precisa se preocupar com isso porque o tutorial está seguindo esse padrão, então não precisa se preocupar.

### Tudo pronto

Feito as mudanças no arquivo de Configuração e tendo o banco criado.

Você ver essa algo como a imagem abaixo:

![Home](https://github.com/rodrigoyuri/assets-readme/blob/main/PHPtest/home.png)

Como testes temos:

- Passar um CEP inválido que vai gerar um alert.

- Passar um CEP valido, fazendo com que a aplicação consulte a API e após isso salve no banco de dados.

- Não passar nenhum CEP não vai acontecer nada apenas o input vai ser limpo.

Esses são alguns testes, mas você pode fazer alguns outros testes para ver o que acontece.

Espero que goste e qualquer feedback que possa me ajudar a melhorar estou a todo ouvido.

Obrigado e até a proxima ✌️.

# Contato

**LinkedIn:** https://github.com/rodrigoyuri/

**E-mail:** rodrigo_yuri@hotmail.com