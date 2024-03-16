<?php

namespace App\Http\Controllers;
use Illuminate\View\View;

class GuideController extends Controller
{
    public function index()
    {
        $viewData = [];
        $viewData['title'] = 'Guides - Eden of Eden';
        $viewData['subtitle'] = 'Guides';

        return view('guide.index')->with('viewData', $viewData);
    }
}
