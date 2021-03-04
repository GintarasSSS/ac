<?php

namespace App\Http\Controllers;

use App\Models\City as CityModel;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class Weather extends Controller
{
    const APP_URL = 'http://api.openweathermap.org/data/2.5/weather?q=%s&APPID=%s&units=metric';

    public function index(Request $request): JsonResponse
    {
        $location = explode(',', $request->get('location'));

        array_walk($location, 'trim');

        if (count($location) != 2 || !CityModel::where('name', $location[0])->where('country', $location[1])->count()) {
            return response()->json(['error' => 'Wrong location passed.']);
        }

        try {
            $response = Http::get(sprintf(
                self::APP_URL,
                implode(',', $location),
                env('APPID')
            ));

            return response()->json($response->collect()->toArray());
        } catch (\Exception $e) {
            return response()->json(['error' => 'Error occurred.']);
        }
    }
}
