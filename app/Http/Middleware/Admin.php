<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Admin
{
    public function handle(Request $request, Closure $next)
    {
        if (Auth::user() &&  Auth::user()->is_admin === 1) {
            return $next($request);
        } else {
            toastr()->error('Bạn không có quyền truy cập vui lòng quay lại');
            abort(403);
        }
    }
}
