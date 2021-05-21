<?php

namespace App\Http\Middleware;

use Closure;
use Session;

class SetLocale
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        
        if(in_array($request->segment(1),['en','ru'])){
        app()->setLocale($request->segment(1));
        Session::put('lang', $request->segment(1));
        return $next($request);
        }else{
           
            app()->setLocale('az');
            Session::put('lang', 'az');
            
            return $next($request);
        }
    }
}
