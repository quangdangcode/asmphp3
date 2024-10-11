<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Support\Facades\Auth;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
    public function handle($request, Closure $next, ...$guards)
    {
        // dd(Auth::user()->role);
        if (Auth::check() && Auth::user()->role === 'admin') {
            return $next($request);
        }
        abort(403, 'Bạn không có quyền truy cập trang này.');
    }
}
