<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Plant;
use App\Models\Review;
use App\Util\UserDataValidation;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\View\View;

class PlantController extends Controller
{
    public function index(Request $request): View
    {
        $sortBy = $request->input('sort_by');

        $plants = Plant::query();

        switch ($sortBy) {
            case 'newest':
                $plants->orderByDesc('created_at');
                break;
            case 'oldest':
                $plants->orderBy('created_at');
                break;
            case 'price_high':
                $plants->orderByDesc('price');
                break;
            case 'price_low':
                $plants->orderBy('price');
                break;
            default:
                break;
        }

        $viewData = [];
        $viewData['title'] = 'Plants - Online Store';
        $viewData['subtitle'] = 'List of plants';
        $viewData['plants'] = $plants->get();
        $viewData['categories'] = Category::all();

        return view('plant.index')->with('viewData', $viewData);
    }

    public function show(string $id): View
    {
        $plant = Plant::findOrFail($id);
        $viewData = [];
        $viewData['title'] = $plant->getName().' - Online Store';
        $viewData['subtitle'] = $plant->getName().' - Plant information';
        $viewData['plant'] = $plant;
        $viewData['reviews'] = Review::where('plant_id', $id)->get();
        $viewData['categories'] = Category::all();

        return view('plant.show')->with('viewData', $viewData);
    }

    public function create(): View
    {
        $viewData = [];
        $viewData['title'] = 'Create plant';
        $viewData['categories'] = Category::all();

        return view('plant.create')->with('viewData', $viewData);
    }

    public function save(Request $request): RedirectResponse
    {
        $validator = new UserDataValidation();

        $validatedData = $validator->validatePlantRequest($request);

        Plant::create($validatedData);

        Session::flash('success', 'Element created successfully.');

        return redirect()->back();

    }

    public function delete(string $id): RedirectResponse
    {
        Plant::destroy($id);

        Session::flash('success', 'Plant deleted successfully.');

        return redirect()->route('plant.index');
    }

    public function search(Request $request): View
    {
        $search = $request->input('search');

        $plants = Plant::where('name', 'like', '%'.$search.'%')
            ->orWhere('description', 'like', '%'.$search.'%')
            ->get();

        $viewData = [];
        $viewData['title'] = 'Search Results';
        $viewData['subtitle'] = 'Search results for: '.$search;
        $viewData['plants'] = $plants;

        return view('plant.index')->with('viewData', $viewData);
    }
}
