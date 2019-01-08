<?php

namespace PsyAutenticacao;

use Closure;


final class HandlePsyAuth
{

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

        $psyAuth = new PsyAuth($request);

        if (!$psyAuth->validaToken()) {

            abort(401, 'Unauthorized');
        }

        return $next($request);
    }
}