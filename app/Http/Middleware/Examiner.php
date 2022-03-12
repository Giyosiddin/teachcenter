<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Examiner
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
       if(Auth::user()){
           if( Auth::user()->isBuyer() || Auth::user()->isGrant() || Auth::user()->isAdmin()){
                return $next($request);
           }else{
                return back()->with(['msg'=>'Siz testni sotib olishingiz kerak.']);
           }
        }else{
            return redirect('/login');
        }
    }
}
