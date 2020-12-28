<?php

/**
 * ----------------------------------------------------------------------------------------------------------------
 * Psy Autênticação config
 * ----------------------------------------------------------------------------------------------------------------
 *
 * Utiliz as achaves do .env para fazer suas configurações
 * PSYAUTH_URL = URL do serviço de autenticação
 * PSYAUTH_TOKEN = Token disponibilizado pelo serviço de autenticação (Para gerar veja a documentação do serviço)
 */

return [
    'psyAuthUrl' => env('PSYAUTH_URL', 'http://localhost'),
    'psyAuthToken' => env('PSYAUTH_TOKEN', '123456'),
    'psyAuthUseForwardedFor' => env('PSYAUTH_USE_FORWARDED_FOR', false),
    'ipsLiberados' => ['127.0.0.1'],
];
