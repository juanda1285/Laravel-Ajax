<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

# Prueba Laravel Ajax

La base de datos está en un archivo SQLITE dentro del proyecto como lo hace laravel por defecto.

# Pasos para la ejecución del proyecto

## Clonar el Repositorio

Para clonar este repositorio, utiliza el siguiente comando en el CMD ( o tambien pueden descargar el .ZIP ):

git clone https://github.com/juanda1285/Laravel-Ajax.git

## Instalar Dependencias 

Dentro del proyecto abrir una terminal y ejecutar : 

composer install

## Configurar Entrono

Ejecutar el siguiente comando para las variables de entorno 

copy .env.example .env

## Generar nueva key

Generar una nueva key para la aplicación no es necesario pero es una buena practica para prevenir problemas de seguridad , aca el comando : 

php artisan key:generate

## Ejecutar el servidor de desarrollo

Para ejecutar el serivdor utiliza el siguiente comando : 

php artisan serve


