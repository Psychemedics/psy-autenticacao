# Psy Autênticação


## Sobre

Pacote de comunicação com servidor de autênticação Psychemedis

## Instalação

### Composer
````
composer require psychemedics/psy-autenticacao
````

#### Laravel < 5.5

##### `config/app.php`
````
'providers' => [
    ...
    PsyAutenticacao\ServiceProvider::class,
],
````

#### ENV
````
PSYAUTH_URL=http://localhost
PSYAUTH_TOKEN=123456
````

### Publicação

Utilize o comando abaixo para publicar o aruqivo de configuração `config/psyauth.php`:
````
php artisan vendor:publish --provider="PsyAutenticacao\ServiceProvider"
````

