<?php

namespace App\Http;
use Illuminate\Foundation\Http\Kernel as HttpKernel;

class Kernel extends HttpKernel
{
    protected $middleware = [
        
    ];

    protected $middlewareGroups = [
        "web"=>[

        ],

        "api"=>[
            "throttle:api",
        ],
    ];
    
    protected $routeMiddleware = [
        "admin.auth"=>\App\Http\Middleware\AdminAuthentificationMiddleware::class,
    ];
}
