<?php

// Made by: Santiago Neusa Ruiz

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Item;
use App\Models\Order;
use App\Models\Plant;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class CartController extends Controller
{
    public function index(Request $request): View
    {
        $total = 0;
        $plantsInCart = [];
        $plantsInSession = $request->session()->get('plants');

        if ($plantsInSession) {
            $plantsInCart = Plant::findMany(array_keys($plantsInSession));
            $total = Plant::sumPricesByQuantities($plantsInCart, $plantsInSession);
        }

        $viewData = [];
        $viewData['title'] = 'Shopping Cart - Eden of Eden';
        $viewData['subtitle'] = 'Shopping Cart';
        $viewData['total'] = $total;
        $viewData['plants'] = $plantsInCart;
        $viewData['categories'] = Category::all();

        $userBalance = User::findOrFail(Auth::user()->getId())->getBalance();
        if ($total != 0 && $userBalance < $total) {
            $viewData['notEnoughBalance'] = true;
        } else {
            $viewData['notEnoughBalance'] = false;
        }
        $viewData['breadcrumbs'] = [
            ['title' => 'Home', 'url' => route('home.index')],
            ['title' => 'Shopping Cart', 'url' => route('cart.index')],
        ];

        return view('cart.index')->with('viewData', $viewData);
    }

    public function add(Request $request, $id): RedirectResponse
    {
        $plants = $request->session()->get('plants');
        $plants[$id] = $request->input('quantity');
        $request->session()->put('plants', $plants);

        return redirect()->route('cart.index');
    }

    public function delete(Request $request): RedirectResponse
    {
        $request->session()->forget('plants');

        return redirect()->route('cart.index');
    }

    public function purchase(Request $request): View|RedirectResponse
    {
        Order::validate($request);

        $plantsInSession = $request->session()->get('plants');

        if ($plantsInSession) {

            $userId = Auth::user()->getId();

            $order = new Order();
            $order->setUserId($userId);
            $order->setTotal(0);
            $order->setAddress($request->input('address'));
            $order->save();

            $total = 0;
            $plantsInCart = Plant::findMany(array_keys($plantsInSession));

            foreach ($plantsInCart as $plant) {
                $quantity = $plantsInSession[$plant->getId()];
                $item = new Item();
                $item->setQuantity($quantity);

                $plant->setStock($plant->getStock() - $quantity);

                $item->setPrice($plant->getPrice());
                $item->setPlantId($plant->getId());
                $item->setOrderId($order->getId());
                $item->save();
                $total = $total + ($plant->getPrice() * $quantity);
            }

            $order->setTotal($total);
            $order->save();

            $newBalance = Auth::user()->getBalance() - $total;
            Auth::user()->setBalance($newBalance);

            Auth::user()->save();
            $request->session()->forget('plants');

            $viewData = [];
            $viewData['title'] = 'Purchase - Online Store';
            $viewData['subtitle'] = 'Purchase Status';
            $viewData['order'] = $order;
            $viewData['categories'] = Category::all();
            $viewData['breadcrumbs'] = [
                ['title' => 'Home', 'url' => route('home.index')],
                ['title' => 'Shopping Cart', 'url' => route('cart.index')],
            ];

            return view('cart.purchase')->with('viewData', $viewData);

        } else {
            return redirect()->route('cart.index');
        }
    }
}
