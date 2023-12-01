<?php


namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repository\Interfaces\StoreRepositoryInterface;
use App\Repository\StoreRepository;

use App\Repository\Interfaces\ProductRepositoryInterface;
use App\Repository\ProductRepository;

use App\Repository\Interfaces\SettingRepositoryInterface;
use App\Repository\SettingRepository;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(StoreRepositoryInterface::class, StoreRepository::class);
        $this->app->bind(ProductRepositoryInterface::class, ProductRepository::class);
        $this->app->bind(SettingRepositoryInterface::class, SettingRepository::class);
    }
}
