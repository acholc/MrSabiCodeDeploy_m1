<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->check()) {
            if(Auth::User()->active==1){
                 return redirect()->route('adm.admin');
            }
            if(Auth::User()->active==0){
                  return redirect()->route('edit-profile');
            }
          
        }

        return $next($request);
    }
}
