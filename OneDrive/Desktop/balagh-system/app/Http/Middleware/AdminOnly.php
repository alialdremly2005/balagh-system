<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminOnly
{
    public function handle(
        Request $request,
        Closure $next
    ): Response {

        if (!session('user_id')) {
            return redirect('/login');
        }

        if (session('user_role') !== 'admin') {
            return redirect('/dashboard')->with(
                'error',
                'ليس لديك صلاحية لدخول لوحة الإدارة.'
            );
        }

        return $next($request);
    }
}