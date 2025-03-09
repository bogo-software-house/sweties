<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class CheckRole
{
    public function handle(Request $request, Closure $next, ...$roles)
    {


        Log::debug('Middleware Called', [
                'roles' => $roles,
                'authenticated' => Auth::check()
            ]);

        if (!Auth::check()) {
            return response()->json(['message' => 'Unauthorized'], 401);
        }

        $user = Auth::user();

        // Log informasi pengguna dan peran mereka
         Log::debug('User and Role debug', [
        'user_id' => $user->custom_id,
        'username' => $user->username,
        'roles_custom_id' => $user->roles_custom_id,
        'role_relation' => $user->role,
        'required_roles' => $roles
    ]);

       // Gunakan metode hasRole dari model
    if (!$user->hasRole($roles)) {
        return response()->json([
            'message' => 'Forbidden',
            'required_roles' => $roles,
            'user_role' => $user->role ?? null
        ], 403);
    }

        return $next($request);
    }
}
