<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    public function handle(Request $request, Closure $next, ...$roles)
    {
        $user = Auth::user();

        if (!$user || !in_array($user->role, $roles)) {
            switch ($user->role) {
                case 'guru':
                    return redirect('/index-guru');
                    break;
                case 'admin':
                    return redirect('/admin/indexadm');
                    break;
                case 'siswa':
                    return redirect('/index-siswa');
                    break;
                case 'sekretaris':
                    return redirect('/index-sekretaris');
                    break;

                default:
                    # code...
                    return redirect('/');
            }
        }

        return $next($request);
    }
}
