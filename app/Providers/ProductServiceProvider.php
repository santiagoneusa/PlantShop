<?php

namespace App\Providers;

use App\Interfaces\ProductService;
use App\Util\ProductServiceApi;
use Illuminate\Support\ServiceProvider;

class ProductServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(ProductService::class, function () {
            return new ProductServiceApi();
        });
    }
}
