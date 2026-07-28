<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Http\Request;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        api: __DIR__.'/../routes/api.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )

    ->withMiddleware(function (Middleware $middleware): void {
        $middleware->api(append: [
            \App\Http\Middleware\UpdateUserPresence::class,
            \App\Http\Middleware\UpdateUserLastSeen::class,
        ]);
    })
->withExceptions(function (Exceptions $exceptions) {
        // Intercept Authentication Exceptions for API requests
        $exceptions->render(function (AuthenticationException $e, Request $request) {
            if ($request->is('api/*') || $request->wantsJson()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Authentication failed. Please provide a valid Bearer token in the Authorization header.',
                    'error'   => $e->getMessage(),
                ], 401);
            }
        });
    })->create();
