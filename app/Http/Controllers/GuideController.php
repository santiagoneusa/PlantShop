<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Guide;
use Illuminate\View\View;

class GuideController extends Controller
{
    public function index(): View
    {
        $viewData = [];
        $viewData['title'] = __('controller.titles.guides');
        $viewData['subtitle'] = __('controller._guides');
        $viewData['guides'] = Guide::all();
        $viewData['categories'] = Category::all();

        $viewData['breadcrumbs'] = [
            ['title' => __('controller.home'), 'url' => route('home.index')],
            ['title' => __('controller._guides'), 'url' => route('guide.index')],
        ];

        return view('guide.index')->with('viewData', $viewData);
    }

    public function show(string $id): View
    {
        $guide = Guide::findOrFail($id);

        $viewData = [];
        $viewData['title'] = __('controller.titles.guides');
        $viewData['subtitle'] = $guide->getTitle();
        $viewData['guide'] = $guide;
        $viewData['categories'] = Category::all();

        $viewData['breadcrumbs'] = [
            ['title' => __('controller.home'), 'url' => route('home.index')],
            ['title' => __('controller._guides'), 'url' => route('guide.index')],
            ['title' => $guide->getTitle(), 'url' => route('guide.show', ['id' => $guide->getId()])],
        ];

        return view('guide.show')->with('viewData', $viewData);
    }
}
