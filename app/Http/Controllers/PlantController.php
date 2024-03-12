<?php

namespace App\Http\Controllers;

use App\Models\Plant;
use App\Util\UserDataValidation;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\View\View;

class PlantController extends Controller
{
    public function index(): View
    {
        $viewData = [];
        $viewData['title'] = 'Plants - Online Store';
        $viewData['subtitle'] = 'List of plants';
        $viewData['plants'] = Plant::all();

        return view('plant.index')->with('viewData', $viewData);
    }

    public function show(string $id): View
    {
        $plant = Plant::findOrFail($id);
        $viewData = [];
        $viewData['title'] = $plant->getName().' - Online Store';
        $viewData['subtitle'] = $plant->getName().' - Plant information';
        $viewData['plant'] = $plant;

        return view('plant.show')->with('viewData', $viewData);
    }

    public function create(): View
    {
        $viewData = [];
        $viewData['title'] = 'Create plant';

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
}
