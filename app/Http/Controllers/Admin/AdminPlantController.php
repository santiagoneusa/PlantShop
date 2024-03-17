<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Plant;
use App\Models\Category;
use App\Models\Review;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\View\View;
use Illuminate\Support\Facades\Storage;

class AdminPlantController extends Controller
{
    public function index(Request $request): View
    {
        $plants = Plant::all();

        $viewData = [];
        $viewData['title'] = 'Manage Plants - Garden of Eden';
        $viewData['plants'] = $plants;

        return view('admin.plant.index')->with('viewData', $viewData);
    }

    public function show(string $id): View
    {
        $plant = Plant::findOrFail($id);
        $viewData = [];
        $viewData['title'] = $plant->getName().' - Online Store';
        $viewData['subtitle'] = $plant->getName().' - Plant information';
        $viewData['plant'] = $plant;
        $viewData['reviews'] = Review::where('plant_id', $id)->get();

        return view('admin.plant.show')->with('viewData', $viewData);
    }

    public function create(): View
    {
        $viewData = [];
        $viewData['title'] = 'Create plant';
        $viewData['categories'] = Category::All();

        return view('admin.plant.create')->with('viewData', $viewData);
    }

    public function save(Request $request): RedirectResponse
    {
        Plant::validate($request);     
        
        $plant = new Plant();
        $plant->setName($request->input('name'));
        $plant->setDescription($request->input('description'));
        $plant->setPrice($request->input('price'));
        $plant->setStock($request->input('stock'));
        $plant->setCategoryId($request->input('category_id'));
        $plant->save();

        if ($request->hasFile('image')) {
            $imageName = $plant->getId().".".$request->file('image')->extension();
            Storage::disk('public')->put(
                $imageName,
                file_get_contents($request->file('image')->getRealPath())
            );
            $plant->setImage($imageName);
            $plant->save();
        }

        Session::flash('success', 'Plant '.$plant->getId().' created successfully.');

        return redirect()->route('admin.plant.index');
    }

    public function delete(string $id): RedirectResponse
    {
        Plant::destroy($id);

        Session::flash('success', 'Plant deleted successfully.');

        return redirect()->route('admin.plant.index');
    }
}
