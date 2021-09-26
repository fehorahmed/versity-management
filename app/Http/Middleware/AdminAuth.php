<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AdminAuth
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
        if($request->session()->has('Admin_login')){

        }else{
            Session::flash('message','Access Denied ! Please Login');
            return redirect()->route('admin.index');
        }
        return $next($request);
    }
}
