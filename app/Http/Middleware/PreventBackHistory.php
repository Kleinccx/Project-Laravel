<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\UserController;
class PreventBackHistory
{
    public function handle(Request $request, Closure $next)
    {
        if (Auth::check() && ($request->is('login') || $request->is('register'))) {
            return redirect()->route('admin.dashboard');
        }

        if (Auth::check() && $request->is('profile')) {
            return $next($request);
        }

        $response = $next($request);

        return $response->header('Cache-Control', 'no-cache, no-store, must-revalidate')
                        ->header('Pragma', 'no-cache')
                        ->header('Expires', '0');
    }
}
