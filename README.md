# Teste Técnico Brunsker
## Linguagens utilizadas:
Para desenvolver o desafio em questão, foram utilizadas as seguintes linguagens:
- PHP com framework laravel 7.2;
- Frontend utilizando AngularJS e Blade com auxílio de HTML 5, CSS3 e jquery
- Comunicação Frontend/Backend utilizando Ajax/Json (REST).
- Banco de dados mysql
## Dependências:
Para executar o projeto as seguinte dependências são necessárias:
- PHP 7.2
- Mysql
- Apache
- git
- composer
### Pode ser usado pacotes como xampp, lamp, wamp.

## Requisitos necessários:
- Clone o repositório;
- Crie o arquivo .env semelhante o .env.example ajustado nome da base, host, user e password;
- Na raiz do projeto abra um prompt e execute os comandos: composer install;
- php artisan key:generate;
- Executar o dump do banco. O script está no diretório /dump_bd
- php artisan serve
## Descrição do projeto
- Para execução do projeto, visando aproveitar o máximo do framework, utilizei o eloquent pra realizar as consultas.
- O projeto foi estruturado em MVC.
- Login: Está sendo salvo um password criptografado. Para a criptografia dos passwords, utilizei os próprios recursos do framework Laravel, assim como para a autenticação.
