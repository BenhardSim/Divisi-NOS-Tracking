<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class isAdmin
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
        // auth()->guest() : mengecek apakah user yang mengakses sudah login atau blm 
        // !auth()->user()->level_akun !== 5 : mengecek apa role dari user yang login kalau bukan admin maka abort 
        if(auth()->guest() || auth()->user()->level_akun !== 5){
            abort(403);
        }
        return $next($request);
    }
}
