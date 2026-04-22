<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Symfony\Component\HttpFoundation\Response;

class UpdateUserPresence
{

// This code is a middleware that updates the user's presence status in the cache. When a user makes a request, it checks if the user is authenticated and then stores their presence status in the cache with a 5-minute expiry. This allows the application to track which users are currently online.
    public function handle(Request $request, Closure $next)
    {
        if (Auth::check()) {
            $expiresAt = now()->addMinutes(5);
            // Store user ID in cache with a 5-minute expiry
            Cache::put('user-is-online-' . Auth::id(), true, $expiresAt);
        }

        return $next($request);
    }


}


