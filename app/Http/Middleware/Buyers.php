<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Buyers
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if(\Auth::user() && \Auth::user()->isBuyer()){
            return $next($request);
        }else{
            return redirect('/login');
        }
    }
}
