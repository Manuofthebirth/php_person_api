# PHP REST API

Esse projeto é um desafio do processo seletivo da VAV Audio Visual usando uma PHP REST API.

> This is a PHP REST API challenge for VAV Audio Visual hiring process.

## Tools

```sh
Postman
XAMPP

PHP 7.3.2
phpMyAdmin 4.8.5
Apache 2.4.38
MySQL 8.0.15
```

## Localhost Setup

Instale o Postman (https://www.getpostman.com/). 
Caso não tenha o XAMPP instalado (https://www.apachefriends.org/index.html), desinstale TODAS as outras ferramentas mencionadas e instale o pacote (isso vai te poupar MUITO tempo!). 
Inicialize o Apache e MySQL pelo XAMPP e clique no 'Admin' do MySQL. No phpMyadmin, crie uma DB com o nome 'contactlist' e importe o arquivo 'contactlist.sql'.

> Install Postman and uninstall EVERY other tool mentioned in case you don't have XAMPP and install the package (this will save you A LOT of time!).
> Start Apache and MySQL with XAMPP and click on 'Admin' from MySQL. Create a DB with the name 'contactlist' in phpMyAdmin and import 'contactlist.sql'.

### Postman

Localhost API URL

```sh
http://localhost/php_person_api
```
API Headers for PUT, POST and DELETE requests

```sh
Key: Content-Type
Value: application/json
```
### API Endpoints

```sh
GET    /api/read.php
GET    /api/read_single.php?id={desired id}
GET    /api/read_search.php?input={desired name or surname}
POST   /api/create.php
PUT    /api/update.php
DELETE /api/delete.php
```