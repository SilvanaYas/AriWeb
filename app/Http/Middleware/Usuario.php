<?php

namespace Scpm\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Guard;


class Usuario
{

    protected $auth;

    /**
     * Create a new middleware instance.
     *
     * @param  Guard  $auth
     * @return void
     */
    public function __construct(Guard $auth)
    {
        $this->auth = $auth;
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        switch ($this->auth->user()->idRol)
         {
            case '1':
                # Administrador
                return redirect()->to('admin');
                break;

            case '2':
                # Operador Admin    
                return redirect()->to('company');
                break;

            case '3':
                # Operador Sucursal
                //return redirect()->to('branch');
                break;
            
            default:
                # USUARIO NO AUTORIZADO...
                return redirect()->to('/');
                break;
        }
            return $next($request);
    }
}
