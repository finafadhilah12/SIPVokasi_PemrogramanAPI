<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
protected function redirectTo($request)
{
    if (!$request->expectsJson()) {
        if ($request->is('admin') || $request->is('admin/*') || $request->is('dashboard/admin') || $request->is('dashboard/admin/*')) {
            return route('admin.login');
        }

        if ($request->is('mahasiswa') || $request->is('mahasiswa/*') || $request->is('dashboard/mahasiswa') || $request->is('dashboard/mahasiswa/*')) {
            return route('mahasiswa.login');
        }

        // Fallback (jaga-jaga kalau ada akses lain)
        return '/';
    }
}

}
