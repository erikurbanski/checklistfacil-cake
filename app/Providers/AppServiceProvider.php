<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Http\Repositories\CakeRepository;
use App\Http\Repositories\Interfaces\CakeRepositoryInterface;
use App\Http\Repositories\ClientRepository;
use App\Http\Repositories\Interfaces\ClientRepositoryInterface;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(CakeRepositoryInterface::class, CakeRepository::class);
        $this->app->bind(ClientRepositoryInterface::class, ClientRepository::class);

    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
