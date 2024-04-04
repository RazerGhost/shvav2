<?php

use App\Http\Middleware\Admin;
use App\Http\Middleware\Employee;
use App\Http\Middleware\Provider;
use App\Http\Middleware\User;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->alias([
            'Admin' => Admin::class,
            'Employee' => Employee::class,
            'User' => User::class,
            'Provider' => Provider::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        $exceptions->render(function (Throwable $exception) {
            return response()->json([
                'message' => $exception->getMessage(),
            ], 500);
        });
        //
    })->create();
