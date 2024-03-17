<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Plant;
use App\Models\Review;
use Illuminate\Http\Request;
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

    public function show(string $id, Request $request): View
    {
        $plant = Plant::findOrFail($id);
        $viewData = [];
        $viewData['title'] = $plant->getName().' - Online Store';
        $viewData['subtitle'] = $plant->getName().' - Plant information';
        $viewData['plant'] = $plant;
        $viewData['reviews'] = Review::where('plant_id', $id)->get();
        $viewData['categories'] = Category::all();

        $reviewsQuery = Review::where('plant_id', $id);

        $sortBy = $request->input('sort_by', 'newest');
        switch ($sortBy) {
            case 'oldest':
                $reviewsQuery->orderBy('created_at');
                break;
            case 'lowest_rated':
                $reviewsQuery->orderBy('stars');
                break;
            case 'highest_rated':
                $reviewsQuery->orderByDesc('stars');
                break;
            default:
                $reviewsQuery->orderByDesc('created_at');
                break;
        }

        $viewData['reviews'] = $reviewsQuery->get();

        return view('plant.show')->with('viewData', $viewData);
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
