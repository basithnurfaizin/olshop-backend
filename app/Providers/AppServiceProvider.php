<?php

namespace App\Providers;

use App\Repository\impl\ProductGalleryRepositoryImpl;
use App\Repository\impl\ProductRepositoryImpl;
use App\Repository\impl\TransactionRepositoryImpl;
use App\Repository\ProductGalleryRepository;
use App\Repository\ProductRepository;
use App\Repository\TransactionDetailRepository;
use App\Repository\TransactionDetailRepositoryImpl;
use App\Repository\TransactionRepository;
use App\Services\impl\ProductGalleryServiceImpl;
use App\Services\impl\ProductServicesImpl;
use App\Services\impl\TransactionServicesImpl;
use App\Services\ProductGalleryServices;
use App\Services\ProductServices;
use App\Services\TransactionServices;
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
        //repository
        $this->app->bind(
            ProductRepository::class,
            ProductRepositoryImpl::class
        );

        $this->app->bind(
            ProductGalleryRepository::class,
            ProductGalleryRepositoryImpl::class
        );

        $this->app->bind(TransactionRepository::class,
            TransactionRepositoryImpl::class
        );

        $this->app->bind(TransactionDetailRepository::class,
            TransactionDetailRepositoryImpl::class
        );

        //services
        $this->app->bind(
            ProductServices::class,
            ProductServicesImpl::class
        );

        $this->app->bind(
            ProductGalleryServices::class,
            ProductGalleryServiceImpl::class
        );

        $this->app->bind(
            TransactionServices::class,
            TransactionServicesImpl::class
        );
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
