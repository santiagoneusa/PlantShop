<?php

// Made by: Jhonnathan Stiven Ocampo Díaz

namespace App\Http\Controllers;

use App\Models\Guide;
use Illuminate\View\View;

class GuideController extends Controller
{
    public function index()
    {
        $viewData = [];
        $viewData['title'] = 'Guides - Eden of Eden';
        $viewData['subtitle'] = 'Guides';
        $viewData['guides'] = Guide::all();

        return view('guide.index')->with('viewData', $viewData);
    }

    public function show(string $id): View
    {
        $guide = Guide::findOrFail($id);

        $viewData = [];
        $viewData['title'] = 'Category: '.$guide->getGuide().' - Garden of Eden';
        $viewData['subtitle'] = $guide->getGuide();
        $viewData['guide'] = $guide;

        return view('category.show')->with('viewData', $viewData);
    }
}
