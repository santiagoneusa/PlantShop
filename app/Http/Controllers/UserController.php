<?php

namespace App\Http\Controllers;

use App\Interfaces\OrdersReport;
use App\Models\Category;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class UserController extends Controller
{
    public function index(): View
    {
        $user_id = Auth::user()->getId();

        $viewData = [];
        $viewData['title'] = __('controller.titles.profile');
        $viewData['subtitle'] = __('controller.profile_information');
        $viewData['user'] = User::findOrFail($user_id);
        $viewData['orders'] = Order::where('user_id', $user_id)->get();
        $viewData['categories'] = Category::all();
        $viewData['breadcrumbs'] = [
            ['title' => __('controller.home'), 'url' => route('home.index')],
            ['title' => __('controller.profile'), 'url' => route('user.index')],
        ];

        return view('user.index')->with('viewData', $viewData);
    }

    public function reports(Request $request, string $fileType)
    {
        $user_id = Auth::id();
    
        $ordersJson = Order::where('user_id', $user_id)->get()->toJson();
        $report = app(OrdersReport::class, ['fileType' => $fileType]);
        $pathToFile = $report->store($ordersJson);
    
        return response()->download($pathToFile);
    }
    
}
