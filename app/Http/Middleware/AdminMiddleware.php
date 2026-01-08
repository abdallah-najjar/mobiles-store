<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        if (!auth()->check()) {
            return redirect()->route('admin.login')->with('error', 'يجب تسجيل الدخول للوصول إلى لوحة التحكم');
        }

        if (!auth()->user()->is_admin) {
            auth()->logout();
            return redirect()->route('admin.login')->with('error', 'غير مصرح لك بالدخول إلى لوحة التحكم');
        }

        return $next($request);
    }
}
