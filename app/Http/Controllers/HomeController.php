<?php

// Made by: Jhonnathan Stiven Ocampo Díaz

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class HomeController extends Controller
{
    public function index(): View
    {
        $viewData = [];
        $viewData['title'] = 'Home - Eden of Eden';
        $viewData['subtitle'] = 'Welcome to the Eden of Garden!';
        $viewData['categories'] = Category::all();
        $viewData['breadcrumbs'] = [
            ['title' => 'Home', 'url' => route('home.index')],
        ];

        return view('home.index')->with('viewData', $viewData);
    }

    public function locale(string $locale): RedirectResponse
    {
        session(['locale' => $locale]);

        return redirect()->back()->withCookie('locale', $locale);
    }
}
