<?php

namespace App\Providers;

use App\Repositories\OrderInterface;
use App\Repositories\OrderRepositories;
use App\Repositories\ProductInterface;
use App\Repositories\ProductRepositories;
use App\Repositories\UserInterface;

use App\Repositories\UserRepositories;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(ProductInterface::class,ProductRepositories::class);
        $this->app->bind(UserInterface::class , UserRepositories::class);
        $this->app->bind(OrderInterface::class , OrderRepositories::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
