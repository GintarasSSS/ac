<?php

namespace App\Http\Controllers;

use App\Models\City as CityModel;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class City extends Controller
{
    public function index(Request $request): JsonResponse
    {
        return response()->json(
            CityModel::where('name', 'like', $request->get('city') . '%')->get()->toArray()
        );
    }
}
