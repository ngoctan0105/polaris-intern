<?php

namespace App\Providers;

use App\Repository\Contracts\UserRepositoryInterface;
use App\Repository\DefaultImplement\UserRepository;
use App\Repository\Contracts\BookRepositoryInterface;
use App\Repository\Contracts\TransRepositoryInterface;
use App\Repository\Contracts\BookStorageRepositoryInterface;
use App\Repository\DefaultImplement\BookRepository;
use App\Repository\DefaultImplement\BookStorageRepository;
use App\Repository\DefaultImplement\TransRepository;
use Illuminate\Support\ServiceProvider;
use App\Services\GoogleService\GoogleServiceProvider;
use App\Services\UUIDGenerator\UUIDGeneratorServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(UserRepositoryInterface::class, UserRepository::class);
        $this->app->singleton(BookRepositoryInterface::class, BookRepository::class);
        $this->app->singleton(TransRepositoryInterface::class, TransRepository::class);
        $this->app->singleton(BookStorageRepositoryInterface::class, BookStorageRepository::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->register(GoogleServiceProvider::class);
        $this->app->register(UUIDGeneratorServiceProvider::class);
    }
}
