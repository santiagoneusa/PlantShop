<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Util\ReviewDataValidation;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ReviewController extends Controller
{
    public function save(Request $request): RedirectResponse
    {
        $validator = new ReviewDataValidation();

        $validatedData = $validator->validateReviewRequest($request);

        Review::create($validatedData);

        Session::flash('success', 'Comment created successfully.');

        return redirect()->back();
    }
}
