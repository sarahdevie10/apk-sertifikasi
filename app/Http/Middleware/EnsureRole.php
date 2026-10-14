<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnsureRole
{
    public function handle(
        Request $request,
        Closure $next,
        string $role
    ): Response {
        if (!$request->user()) {
            return redirect()->route('login');
        }

        $user = $request->user();

        if ($user->role !== $role) {
            if ($user->role === 'admin') {
                return redirect()->route('dashboard');
            }

            if ($user->role === 'user') {
                return redirect()->route('user.dashboard');
            }

            abort(403);
        }

        return $next($request);
    }
}
