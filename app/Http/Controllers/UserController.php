<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HomeController extends Controller
{
    public function index()
    {
        $viewData = [];
        $viewData['title'] = 'Profile - Eden of Eden';
        $viewData['subtitle'] = 'Profile Information';

        return view('user.index')->with('viewData', $viewData);
    }

    // public function updateImage(Request $request)
    // {
    //     if ($request->hasFile('image')) {
    //         $imageName = $request->$user->getId().'.'.$request->file('image')->extension();

    //         Storage::disk('public')->put(
    //             $imageName,
    //             file_get_contents($request->file('image')->getRealPath())
    //         );

    //         $newProduct->setImage($imageName);
    //         $newProduct->save();
    //     }

    //     return back();
    // }
}
