<?php

namespace App\Http;

use Illuminate\Foundation\Http\Kernel as HttpKernel;

class Kernel extends HttpKernel
{
    protected $middleware = [
        // Middleware applied to all HTTP requests
    ];

    protected $middlewareGroups = [
        'web' => [
            // Middleware for web routes
        ],

        'api' => [
            // Middleware for API routes
        ],
    ];

    protected $routeMiddleware = [
        // Route middleware
        'authorize.private-post' => \App\Http\Middleware\AuthorizePrivatePost::class,
    ];

    // Other middleware entries...
}
