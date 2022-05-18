<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CanManageRecipes
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $user_rol = auth()->user()->id_rol;

        if($user_rol == "2" || $user_rol == "1"){
            return $next($request);
        }else{
            return response()->view('unauthorized');
        }
    }
}
