<?php

namespace App\Http\Middleware;

use Closure;
use App\LogAcesso;
use Illuminate\Http\Request;

class LogAcessoMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        //$request - manipular
        // return $next($request);

        $ip = $request->server->get('REMOTE_ADDR');
        $rota = $request->getRequestUri();
        LogAcesso::create(['log' => "IP $ip requisitou a rota $rota"]);
        // return $next($request);

        $resposta = $next($request);
        $resposta->setStatusCode(201, "O status da resposta e o texto da resposta foram modificados");
        return $resposta;
    }
}
