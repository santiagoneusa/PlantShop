<?php

namespace App\Http\Controllers;

class CartController extends Controller
{
    public function index()
    {
        $viewData = [];
        $viewData['title'] = 'Shopping Cart - Eden of Eden';
        $viewData['subtitle'] = 'Shopping Cart';

        return view('cart.index')->with('viewData', $viewData);
    }
}
