<?php

namespace App\Util;

use Illuminate\Http\Request;

class UserDataValidation
{
    public function validatePlantRequest(Request $request): array
    {
        return $request->validate([
            'name' => 'required',
            'description' => 'required',
            'imageUrl' => 'required',
            'price' => 'required|numeric|gt:0',
            'stock' => 'required|numeric|gte:0',
        ]);
    }
}
