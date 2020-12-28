# Psy Autênticação


## Sobre

Pacote de comunicação com servidor de autênticação Psychemedis

## Instalação

### Composer
````
composer require psychemedics/psy-autenticacao
````

##### `config/app.php` para Laravel < 5.5
````
'providers' => [
    ...
    PsyAutenticacao\ServiceProvider::class,
],
````

##### `app/Http/Kernel.php`
````
protected $routeMiddleware = [
    ...
    'psyauth' => \PsyAutenticacao\HandlePsyAuth::class,
];
````

### Publicação

Utilize o comando abaixo para publicar o aruqivo de configuração `config/psyauth.php`:
````
php artisan vendor:publish --provider="PsyAutenticacao\ServiceProvider"
````

### ENV
````
PSYAUTH_URL=http://localhost
PSYAUTH_TOKEN=123456
PSYAUTH_USE_FORWARDED_FOR=false
````

## Uso
````
Route::middleware('psyauth')->get('/user', function (Request $request) {
    return $request->user();
});
````
