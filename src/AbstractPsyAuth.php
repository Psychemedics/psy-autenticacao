<?php

namespace PsyAutenticacao;

use Exception;
use Firebase\JWT\JWT;
use Illuminate\Support\Facades\Session;


abstract class AbstractPsyAuth implements PsyAuthInterface
{

    protected $request;

    protected $token;


    public function __construct($request)
    {

        $this->request = $request;
        $this->getToken();
    }

    private function getToken()
    {

        $authorization = $this->request->header('Authorization');

        $this->token = str_replace('Bearer ', '', $authorization);
    }

    protected function validaViaServicoDeAutenticacao()
    {

        if( empty($this->token) ) {

            if( in_array($this->request->server('REMOTE_ADDR'), config('psyauth.ipsLiberados')) ) {

                return (object)[
                    'autorizado' => true,
                    'usuario' => null,
                ];
            }

            return (object)[
                'autorizado' => false,
                'usuario' => null,
            ];
        }

        $header = [
            'Accept: application/json',
            'Content-Type: application/json',
            'Authorization: Bearer ' . config('psyauth.psyAuthToken'),
        ];

        $opcoes = [
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_HEADER => 1,
            CURLOPT_URL => config('psyauth.psyAuthUrl') . '/' . $this->token,
            CURLOPT_HTTPHEADER => $header,
        ];

        $curl = curl_init();
        curl_setopt_array($curl, $opcoes);
        $response = curl_exec($curl);

        $tamanhoHeader = curl_getinfo($curl, CURLINFO_HEADER_SIZE);
        $dados = substr($response, $tamanhoHeader);
        $statusCode = curl_getinfo($curl, CURLINFO_HTTP_CODE);

        curl_close($curl);

        if( $statusCode != 200 ) {

            return (object)[
                'autorizado' => false,
                'usuario' => null,
            ];
        }

        $retorno = json_decode($dados);

        return $retorno->data;
    }
}
