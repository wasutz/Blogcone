<?php

namespace App\Http\Middleware;

use Closure;

class Admin
{
    public function handle($request, Closure $next)
    {
        if($request->user()->role_id !== config('roles.admin')){
            return redirect('/');
        }

        return $next($request);
    }
}
