## Sobre o sistema

 O GLB - Gerador de Laudos Balísticos foi desenvolvido utilizando o framework Laravel. Com ele é possível gerar os laudos de eficiência e prestabilidade preenchendo os formulários necessários, sem se preocupar com a formatação do documento final.
 
 
 Copyright © Milena Mognon

## Requisitos

##### Xampp ou Lamp
* PHP >= 7.0.0
* MySql
* Apache

* Composer
* Laravel 
* git

## Como Usar

Tenha instalados todos os requisitos.

Clone o repositório.

Crie uma base de dados no MySql.

No repositório clonado do projeto, faça uma cópia do arquivo .env.exemple com o nome .env

Modifique a database, username e password do banco de dados para o que foi configurado anteriormente.

No repositório, rode os seguintes comando:
 * composer update
 * php artisan key:generate
 * php artisan migrate --seed
 * composer update
 * php artisan serve
 
 Acesse localhost:8000
 



