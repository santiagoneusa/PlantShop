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
        $guides = Guide::all();

        $viewData = [];
        $viewData['title'] = 'Manage guides - Garden of Eden';
        $viewData['guides'] = $guides;

        return view('admin.guide.index')->with('viewData', $viewData);
    }

    public function show(string $id): View
    {
        $guide = Guide::findOrFail($id);
        $viewData = [];
        $viewData['title'] = $guide->getTitle().' - Garden of Eden';
        $viewData['guide'] = $guide;

        return view('admin.guide.show')->with('viewData', $viewData);
    }

    public function create(): View
    {
        $viewData = [];
        $viewData['title'] = 'Create guide';

        return view('admin.guide.create')->with('viewData', $viewData);
    }

    public function save(Request $request): RedirectResponse
    {
        Guide::validate($request);

        $guide = new Guide();
        $guide->setTitle($request->input('title'));
        $guide->setContent($request->input('content'));
        $guide->save();

        if ($request->hasFile('image')) {
            $imageName = 'guide'.$guide->getId().'.'.$request->file('image')->extension();
            Storage::disk('publicGuides')->put(
                $imageName,
                file_get_contents($request->file('image')->getRealPath())
            );
            $guide->setImage($imageName);
            $guide->save();
        }

        Session::flash('success', 'Guide '.$guide->getId().' created successfully.');

        return redirect()->route('admin.guide.index');
    }

    public function delete(string $id): RedirectResponse
    {
        Guide::destroy($id);

        Session::flash('success', 'Guide deleted successfully.');

        $guides = Guide::all();

        $viewData = [];
        $viewData['title'] = 'Manage Guides - Garden of Eden';
        $viewData['guides'] = $guides;

        Session::flash('danger', 'Guide deleted successfully.');

        return redirect()->route('admin.guide.index')->with('viewData', $viewData);
    }

    public function edit(string $id): View
    {
        $viewData = [];
        $guide = Guide::findOrFail($id);

        $viewData['title'] = '';
        $viewData['guide'] = $guide;

        return view('admin.guide.edit')->with('viewData', $viewData);
    }

    public function update(Request $request, string $id): RedirectResponse
    {
        Guide::validate($request);

        $guide = Guide::findOrFail($id);
        $guide->setTitle(request()->input('title'));
        $guide->setContent(request()->input('content'));
        $guide->save();

        if ($request->hasFile('image')) {
            $imageName = 'guide'.$guide->getId().'.'.$request->file('image')->extension();

            Storage::disk('publicGuide')->delete($guide->getImage());
            
            Storage::disk('publicGuide')->put(
                $imageName,
                file_get_contents($request->file('image')->getRealPath())
            );
            
            $guide->setImage($imageName);
        }
        
        $guide->save();

        Session::flash('message', 'guide edited successfully.');
        return redirect()->route('admin.guide.index');
    }
}
