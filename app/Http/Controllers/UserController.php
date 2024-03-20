<?php

// Made by: Santiago Neusa Ruiz

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class UserController extends Controller
{
    public function index(): View
    {
        $user_id = Auth::user()->getId();

        $viewData = [];
        $viewData['title'] = 'Profile - Eden of Eden';
        $viewData['subtitle'] = 'Profile Information';
        $viewData['user'] = User::findOrFail($user_id);
        $viewData['orders'] = Order::where('user_id', $user_id)->get();

        return view('user.index')->with('viewData', $viewData);
    }
}
