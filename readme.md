# Psy Autênticação


## Sobre

Pacote de comunicação com servidor de autênticação Psychemedis

## Instalação

````
composer require psychemedics/psy-autenticacao
````

## Configuração

### Publicação

Utilize o comando abaixo para publicar o aruqivo de configuração `config/psyauth.php`:

````
php artisan vendor:publish --provider="PsyAutenticacao\ServiceProvider"
````

### ENV

````
PSYAUTH_URL=http://localhost
PSYAUTH_TOKEN=123456
````