<?php

namespace App\Http\Middleware;

use Closure;
use Session;

class Lang
{
      public function __construct()
      {
        if ( Session::has('lang') ){
          $lang = Session::get('lang');

          
            app()->setLocale($lang);
        }
      }
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        return $next($request);
    }
}
