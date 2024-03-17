<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Guide;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class AdminGuideController extends Controller
{
    public function index()
    {
        $viewData = [];
        $viewData['title'] = 'Admin - Garden of Eden';

        return view('admin.guide.index')->with('viewData', $viewData);
    }

    public function show(string $id): View
    {
        $plant = Guide::findOrFail($id);
        $viewData = [];
        $viewData['title'] = $plant->getName().' - Garden of Eden';
        $viewData['plant'] = $plant;

        return view('admin.plant.show')->with('viewData', $viewData);
    }

    public function create(): View
    {
        $viewData = [];
        $viewData['title'] = 'Create plant';

        return view('admin.plant.create')->with('viewData', $viewData);
    }

    public function save(Request $request): RedirectResponse
    {
        Guide::validate($request);

        $plant = new Guide();
        $plant->setName($request->input('name'));
        $plant->setDescription($request->input('description'));
        $plant->setPrice($request->input('price'));
        $plant->setStock($request->input('stock'));
        $plant->setCategoryId($request->input('category_id'));
        $plant->save();

        if ($request->hasFile('image')) {
            $imageName = 'plant'.$plant->getId().'.'.$request->file('image')->extension();
            Storage::disk('public')->put(
                $imageName,
                file_get_contents($request->file('image')->getRealPath())
            );
            $plant->setImage($imageName);
            $plant->save();
        }

        Session::flash('success', 'Guide '.$plant->getId().' created successfully.');

        return redirect()->route('admin.plant.index');
    }

    public function delete(string $id): RedirectResponse
    {
        Guide::destroy($id);

        Session::flash('success', 'Guide deleted successfully.');

        $plants = Guide::all();

        $viewData = [];
        $viewData['title'] = 'Manage Plants - Garden of Eden';
        $viewData['plants'] = $plants;

        Session::flash('danger', 'Guide deleted successfully.');

        return redirect()->route('admin.plant.index')->with('viewData', $viewData);
    }

    public function edit(string $id): View
    {
        $viewData = [];
        $plant = Guide::findOrFail($id);

        $viewData['title'] = '';
        $viewData['plant'] = $plant;

        return view('admin.plant.edit')->with('viewData', $viewData);
    }
}
