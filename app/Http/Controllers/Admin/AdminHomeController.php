<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class AdminHomeController extends Controller
{
    public function index()
    {
        $viewData = [];
        $viewData['title'] = 'Admin - Garden of Eden';

        return view('admin.home.index')->with('viewData', $viewData);
    }
}
