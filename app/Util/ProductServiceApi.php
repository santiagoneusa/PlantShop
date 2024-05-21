<?php

namespace App\Util;

use App\Interfaces\ProductService;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class ProductServiceApi implements ProductService
{
    public function getProducts(): array
    {
        try {
            $response = Http::timeout(60)->get('http://devsport.talentosenv.tech/api/products');

            if ($response->successful()) {
                return $response->json();
            }

            return [];
        } catch (\Exception     $e) {
            Log::error('Error fetching products from API: '.$e->getMessage());

            return [];
        }
    }
}
