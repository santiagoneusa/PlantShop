<?php

namespace App\Http\Controllers;

class HomeController extends Controller
{
    public function index()
    {
        $viewData = [];
        $viewData['title'] = 'Home - Eden of Eden';
        $viewData['subtitle'] = 'Welcome to the Eden of Garden!';

        return view('home.index')->with('viewData', $viewData);
    }
}
