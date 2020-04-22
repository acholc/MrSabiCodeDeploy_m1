<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
Use Session;

class UserCheck
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

      if(!Auth::check()){
        return redirect()->guest(route('SignIn'));

       }
       else{
        if(Auth::User()->active==1){
          Auth::logout();
          return redirect()->guest(route('SignIn'));
        }
       }
       return $next($request);       
    }
}

// if(!Session::has('user')||Auth::User()->active==1){
       
//            Session::forget('user');
//            return redirect()->guest(route('SignIn'));
//       }

//         return $next($request);
//     }