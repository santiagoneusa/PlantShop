<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function index(): View
    {
        $viewData = [];
        $viewData['title'] = 'Home - Eden of Eden';
        $viewData['subtitle'] = 'Welcome to the Eden of Garden!';
        $viewData['categories'] = Category::all();

        return view('home.index')->with('viewData', $viewData);
    }
}
