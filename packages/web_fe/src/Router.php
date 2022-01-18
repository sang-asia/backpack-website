<?php

namespace Web\FE;

use Illuminate\Foundation\Support\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Route;

class Router extends RouteServiceProvider
{
    public function boot()
    {
        $this->routes(function () {
            Route::middleware('web')
                ->group(__DIR__ . '/../routes/web.php');
        });
    }
}
