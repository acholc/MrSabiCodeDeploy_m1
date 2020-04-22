<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
Use Session;

class checkadmin
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
         return redirect()->guest(route('adminlogin'));


       }
       else{
        if(Auth::User()->active==0){
          Auth::logout();
          return redirect()->guest(route('adminlogin'));

        }
       }
       return $next($request);    
      
    }
}
    
     //  if(Auth::User())
     // // {
     // //        if(Auth::User()->active==0)
     // //    {
     // //       Auth::logout();
     // //       Session::forget('admin');    
     // //       return redirect()->guest(route('adminlogin'));
     // //    }
       
     // // } 
     // // else 

     // //    return $next($request);