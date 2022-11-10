# Tasks Admin System


### Installation

Install the dependencies and devDependencies and start the server.

Open project directory
```sh
cd laravel-task-api
```
Create .env file from .env.example
```sh
touch or ni .env
```
set sqlite database 
```sh
set DB_CONNECTION=sqlite
```
create database file
```sh
cd database
touch or ni database.sqlite
```
run migration
```sh
cd ..
php artisan migrate
```
run application
```sh
php artisan serve
```
