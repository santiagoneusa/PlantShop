<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\PlantResource;
use App\Models\Plant;
use Illuminate\Http\JsonResponse;

class PlantApiController extends Controller
{
    public function index(): JsonResponse
    {
        $plants = PlantResource::collection(Plant::all());
        return response()->json($plants, 200);
    }

    public function show(string $id): JsonResponse
    {
        $plant = new PlantResource(Plant::findOrFail($id));
        return response()->json($plant, 200);
    }
}
