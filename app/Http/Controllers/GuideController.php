<?php

// Made by: Jhonnathan Stiven Ocampo Díaz

namespace App\Http\Controllers;

use App\Models\Guide;
use Illuminate\View\View;
use App\Models\Category;

class GuideController extends Controller
{
    public function index(): View
    {
        $viewData = [];
        $viewData['title'] = 'Guides - Eden of Eden';
        $viewData['subtitle'] = 'Guides';
        $viewData['guides'] = Guide::all();
        $viewData['categories'] = Category::all();

        $viewData['breadcrumbs'] = [
            ['title' => 'Home', 'url' => route('home.index')],
            ['title' => 'Guides', 'url' => route('guide.index')],
        ];

        return view('guide.index')->with('viewData', $viewData);
    }

    public function show(string $id): View
    {
        $guide = Guide::findOrFail($id);

        $viewData = [];
        $viewData['title'] = 'Guides - Garden of Eden';
        $viewData['subtitle'] = $guide->getTitle();
        $viewData['guide'] = $guide;
        $viewData['categories'] = Category::all();

        $viewData['breadcrumbs'] = [
            ['title' => 'Home', 'url' => route('home.index')],
            ['title' => 'Guides', 'url' => route('guide.index')],
            ['title' => $guide->getTitle(), 'url' => route('guide.show', ['id' => $guide->getId()])],
        ];

        return view('guide.show')->with('viewData', $viewData);
    }
}
