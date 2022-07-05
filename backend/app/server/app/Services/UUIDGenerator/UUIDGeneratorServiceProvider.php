<?php

namespace App\Services\UUIDGenerator;

use App\Services\UUIDGenerator\Logic\UUIDGenerator;
use Illuminate\Support\ServiceProvider;

class UUIDGeneratorServiceProvider extends ServiceProvider
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
        $this->app->singleton(UUIDGenerator::class);
    }
}
