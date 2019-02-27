<?php

namespace PsyAutenticacao;

use Illuminate\Support\Facades\Session;


final class PsyAuth extends AbstractPsyAuth
{


    public function validaToken()
    {

        $dadosRetorno = $this->validaViaServicoDeAutenticacao();

        if (isset($dadosRetorno->usuario)) {

            Session::put('usuario', $dadosRetorno->usuario);
        }

        return $dadosRetorno->autorizado;
    }
}
