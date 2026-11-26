<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * Ensures the authenticated user holds administrator privileges for CMS access.
 */
class EnsureUserIsAdmin
{
    public function handle(Request $request, Closure $next): Response
    {
        if (! $request->user()) {
            return redirect()->route('admin.login');
        }

        if (! $request->user()->is_admin) {
            abort(403, 'Akses ditolak. Akun ini tidak memiliki izin administrator CMS.');
        }

        return $next($request);
    }
}
