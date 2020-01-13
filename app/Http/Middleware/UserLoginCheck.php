<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Session;

class UserLoginCheck
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
        $login = Session::get('login');
        if ($login == NULL) {
            Session::flash('warning', 'Please login first!' );
            Session::flash('type','warning');
            return redirect(route('signin'));
        } else {
            return $next($request); 
        }
    }
}
