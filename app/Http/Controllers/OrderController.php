<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Order;
use App\Models\Plant;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PlantController extends Controller
{
    public function index(Request $request): View|RedirectResponse
    {
        Order::validate($request);

        $user = new User;
        $user = new Item;
        $user = new Plant;

        return view('order.index');
    }
}
