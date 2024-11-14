<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Is_Moderator
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // Check if the user is authenticated
        if (!auth()->check()) {
            return redirect()->route('login')->with('error', 'You need to login to access this page.');
        }

        // Check if the user is a moderator and verified
        if (auth()->user()->is_admin == 2 && auth()->user()->is_verified == 1) {
            return $next($request); // Allow access
        }

        // Log out the user if they do not have access
        Auth::logout(); // Log the user out
        return redirect()->route('login')->with('error', "You don't have moderator access. You have been logged out.");
    }
}
