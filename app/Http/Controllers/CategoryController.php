<?php

// Made by: Jhonnathan Stiven Ocampo Díaz

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Plant;
use Illuminate\View\View;

class CategoryController extends Controller
{
    public function index(): View
    {
        $viewData = [];
        $viewData['title'] = 'Categories - Garden of Eden';
        $viewData['subtitle'] = 'Categories';
        $viewData['categories'] = Category::all();
        $viewData['breadcrumbs'] = [
            ['title' => 'Home', 'url' => route('home.index')],
            ['title' => 'Categories', 'url' => route('category.index')],
        ];
        return view('category.index')->with('viewData', $viewData);
    }

    public function show(string $id): View
    {
        $category = Category::findOrFail($id);
        $plants = Plant::where('category_id', '=', $id)->get();

        $viewData = [];
        $viewData['title'] = 'Category: '.$category->getName().' - Garden of Eden';
        $viewData['subtitle'] = $category->getName().' Plants';
        $viewData['plants'] = $plants;
        $viewData['categories'] = Category::all();
        $viewData['breadcrumbs'] = [
            ['title' => 'Home', 'url' => route('home.index')],
            ['title' => 'Categories', 'url' => route('category.index')],
            ['title' => $category->getName(), 'url' => route('category.show', ['id' => $category->getId()])],
        ];
        
        return view('category.show')->with('viewData', $viewData);
    }
}
