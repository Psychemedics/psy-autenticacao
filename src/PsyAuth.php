<?php

namespace PsyAutenticacao;


final class PsyAuth extends AbstractPsyAuth
{

    public function validaToken()
    {

        return $this->validaViaServicoDeAutenticacao();
    }
}