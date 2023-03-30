<?php

namespace App\Modules\ExportEngine\ServiceProviders;

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as LaravelRouteServiceProvider;

class RouteServiceProvider extends LaravelRouteServiceProvider
{
    public function boot()
    {
        $this->routes(function () {
            Route::prefix('api/v1/export')
                ->name('export.')
                ->middleware(['api'])
                ->group(__DIR__ . '/../Routes/api.php');
        });
    }
}