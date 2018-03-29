<?php

namespace App\Providers;

use App\Service\CameraService;
use App\Service\Impl\CameraServiceImpl;
use Illuminate\Support\ServiceProvider;

class CameraServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(CameraService::class, function ($app) {
            return new CameraServiceImpl();
        });
    }
}
