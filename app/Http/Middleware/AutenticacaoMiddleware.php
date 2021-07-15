<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AutenticacaoMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param Closure $next
     * @param $metodo_autenticacao
     * @param $perfil
     * @return mixed
     */
    public function handle(Request $request, Closure $next, $metodo_autenticacao, $perfil)
    {
        session_start();
        if (isset($_SESSION['email']) && $_SESSION['email'] != '') {
            return $next ($request);
        } else {
            return redirect()->route('site.login', ['erro' => 2]);
        }
    }
}
