<?php

namespace App\Util;

use Illuminate\Http\Request;

class ReviewDataValidation
{
    public function validateReviewRequest(Request $request): array
    {
        return $request->validate([
            'content' => 'required',
            'stars' => 'required|integer|between:1,5',
            'plant_id' => 'required|exists:plants,id',
        ]);
    }
}
