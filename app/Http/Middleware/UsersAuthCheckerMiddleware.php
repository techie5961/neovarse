<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Session;

class UsersAuthCheckerMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
      
        // return Session::get('mode_link');
        if(!Auth::guard('users')->check()){
            return redirect()->to('login');
        }
        View::share('mode_link',Session::get('mode_link',asset('vitecss/css/app.css?v='.config('versions.vite_version').'')));
        return $next($request);
    }
}
