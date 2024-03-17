<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class AdminGuideController extends Controller
{
    public function index()
    {
        $viewData = [];
        $viewData['title'] = 'Admin - Garden of Eden';

        return view('admin.guide.index')->with('viewData', $viewData);
    }
}
