<?php

// Made by: Jhonnathan Stiven Ocampo Díaz

namespace App\Http\Controllers;

use App\Models\Review;
use App\Util\ReviewDataValidation;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class ReviewController extends Controller
{
    public function save(Request $request): RedirectResponse
    {
        $user = Auth::user();

        $validator = new ReviewDataValidation();
        $validatedData = $validator->validateReviewRequest($request, $user->id);

        $review = new Review($validatedData);
        $review->user_id = $user->id;
        $review->save();

        Session::flash('success', 'Comment created successfully.');

        return redirect()->back();
    }
}
