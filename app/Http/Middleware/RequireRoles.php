<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RequireRoles
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check() && User::where('id', Auth::user()->id)->doesntHave('roles')->exists()) {
            if ($request->expectsJson()) {
                return abort(403, 'Unauthorized: No roles assigned');
            }
            return redirect()->route('login')->with('message', 'You do not have the required roles.');
        }
        return $next($request);
    }
}
