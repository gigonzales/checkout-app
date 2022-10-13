<?php

namespace App\Providers;

use App\Repository\Contracts\OfferRepositoryInterface;
use App\Repository\Contracts\ProductRepositoryInterface;
use App\Repository\OfferRepository;
use App\Repository\ProductRepository;
use App\Services\CheckoutService;
use App\Services\CheckoutServiceInterface;
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
        $this->app->bind(
            CheckoutServiceInterface::class,
            CheckoutService::class
        );

        $this->app->bind(
            ProductRepositoryInterface::class,
            ProductRepository::class
        );

        $this->app->bind(
            OfferRepositoryInterface::class,
            OfferRepository::class
        );
    }
}
