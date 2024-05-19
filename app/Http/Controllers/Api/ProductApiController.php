<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Interfaces\ProductService;
use App\Models\Category;
use Illuminate\View\View;

class ProductApiController extends Controller
{
    public function index(ProductService $productApi): View
    {
        $viewData['products'] = $productApi->getProducts();
        $viewData['categories'] = Category::all();
        $viewData['title'] = 'Eden - Online Store';
        $viewData['subtitle'] = 'Dev sport - allied store';
        $viewData['breadcrumbs'] = [
            ['title' => 'Home', 'url' => route('home.index')],
            ['title' => 'Products', 'url' => route('product.index')],
        ];

        return view('product.index')->with('viewData', $viewData);
    }
}
