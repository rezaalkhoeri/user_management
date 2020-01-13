<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Route;

class MethodCheck
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
        // $test = Route::getCurrentRoute()->getActionName();
        // print_r($test);
        // die;
        // return $next($request);
    }
}
