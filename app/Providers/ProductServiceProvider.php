<?php 

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Interfaces\ProductService;
use App\Util\ProductServiceApi;

class ProductServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(ProductService::class, function (){
            return new ProductServiceApi();
        });
    }
}
