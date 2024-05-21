<?php

// Made by: Jhonnathan Stiven Ocampo Díaz

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class ReviewController extends Controller
{
    public function save(Request $request): RedirectResponse
    {
        Review::validate($request);

        $user = Auth::user();
        $review = new Review();
        $review->setContent($request->input('content'));
        $review->setStars($request->input('stars'));
        $review->setPlantId($request->input('plant_id'));
        $review->setUserId($user->getId());
        $review->save();

        Session::flash('success', 'Comment created successfully.');

        return redirect()->back();
    }
}
