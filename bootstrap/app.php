<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use App\Http\Middleware\Hotel;
use App\Http\Middleware\Customer;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->appendToGroup('hotel',[Hotel::class]);
        $middleware->appendToGroup('customer',[Customer::class]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
