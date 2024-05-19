<?php

namespace App\Http\Controllers\Api;

use App\Interfaces\ProductService;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Category;


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
