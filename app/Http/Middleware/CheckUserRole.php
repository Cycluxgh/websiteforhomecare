<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckUserRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, ...$roles): Response
    {
        if (!auth()->check()) {
            // User is not logged in, redirect to login page or return unauthorized
            return redirect('/login'); // Or abort(401);
        }

        $user = auth()->user();

        if (!in_array($user->role, $roles)) {
            // User does not have the required role, redirect or return forbidden
            abort(403, 'Unauthorized action.');
        }

        return $next($request);
    }
}
