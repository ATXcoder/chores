<?php
/**
 * Check to see if user is a Admin
 */

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;

use Closure;

class CheckAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $user = Auth::user();
        if ($user->is_admin != 1) {
            // Redirect to "Not Authorized" Page
            return response()->view('errors.401');
        } else {
            return $next($request);
        }
    }
}
