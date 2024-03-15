<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Mygurd
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
    //    if($request->age < 18){
    //     echo "you are not eligible";
    //     die;
    //    }
        // echo"<br>";

        if(session()->has('user_id')){
            return $next($request);
        }
       else{
        return redirect('not-access');
       }
    }
}
