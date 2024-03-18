<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Plant;
use App\Models\Review;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

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
        $viewData['title'] = $plant->getName().' - Garden of Eden';
        $viewData['plant'] = $plant;
        $viewData['category_name'] = $plant->getCategory()->getName();

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
            $imageName = 'plant'.$plant->getId().'.'.$request->file('image')->extension();
            Storage::disk('publicPlants')->put(
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
        Storage::disk('public')->delete(Plant::findOrFail($id)->getImage());
        Plant::destroy($id);

        Session::flash('success', 'Plant deleted successfully.');

        $plants = Plant::all();

        $viewData = [];
        $viewData['title'] = 'Manage Plants - Garden of Eden';
        $viewData['plants'] = $plants;

        Session::flash('danger', 'Plant deleted successfully.');

        return redirect()->route('admin.plant.index')->with('viewData', $viewData);
    }

    public function edit(string $id): View
    {
        $viewData = [];
        $plant = Plant::findOrFail($id);

        $viewData['title'] = '';
        $viewData['plant'] = $plant;
        $viewData['category_name'] = $plant->getCategory()->getName();

        return view('admin.plant.edit')->with('viewData', $viewData);
    }

    public function update(Request $request, string $id): RedirectResponse
    {
        Plant::validate($request);

        $plant = Plant::findOrFail($id);
        $plant->setName(request()->input('name'));
        $plant->setDescription(request()->input('description'));
        $plant->setPrice(request()->input('price'));
        $plant->setStock(request()->input('stock'));
        $plant->setCategoryId(request()->input('category_id'));

        if ($request->hasFile('image')) {
            $imageName = 'plant'.$plant->getId().'.'.$request->file('image')->extension();

            Storage::disk('publicPlant')->delete($plant->getImage());
            
            Storage::disk('publicPlant')->put(
                $imageName,
                file_get_contents($request->file('image')->getRealPath())
            );
            
            $plant->setImage($imageName);
        }
        
        $plant->save();

        Session::flash('message', 'Plant edited successfully.');
        return redirect()->route('admin.plant.index');
    }
}
