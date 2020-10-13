<?php

namespace App\Http\Middleware;

use Closure;

class authAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(!\Auth::check() or \Auth::user()->role->name !== 'Admin'){
            \Session::flash('message', 'Necesita los privilegios de administrador para acceder a este recurso');
            return redirect()->back();
        }
        return $next($request);
    }
}
