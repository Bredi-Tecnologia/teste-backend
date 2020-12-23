# Informações
## 1 - Instalar Pacotes
```sh
$ cd laravel
$ composer install
```
## 2 - Instalar Banco de Dados
    bredi_test.sql
   ###  Arquivo para criar e conectar ao banco
   Copia dados de exemplo de .env.example
        .env
   ### Comando para gerar APP_KEY
```sh
$ php artisan key:generate
```
   ### Codigo para substituir em .env
```ENV
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=bredi_test
DB_USERNAME=root
DB_PASSWORD=
```
