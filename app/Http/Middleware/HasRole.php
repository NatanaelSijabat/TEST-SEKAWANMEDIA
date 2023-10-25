<?php

namespace App\Http\Middleware;

use App\Models\RoleUser;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class HasRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $roleName): Response
    {
        if (Auth::check()) {
            $user = Auth::user();
            $role = RoleUser::find($user->role_users_id);

            // dd($user);

            if ($role && $role->name != $roleName) {
                abort(403);
            }

            if ($role && $role->name != $roleName) {
                abort(403);
            }
        }
        return $next($request);
    }
}
