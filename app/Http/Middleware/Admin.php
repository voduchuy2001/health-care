<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Admin
{
    public function handle(Request $request, Closure $next)
    {
        if (Auth::user() &&  Auth::user()->role === 'admin') {
            return $next($request);
        } else {
            toastr()->error('You do not have permission to access this resource!');
            abort(403);
        }
    }
}
