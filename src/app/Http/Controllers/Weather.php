<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class Weather extends Controller
{
    public function index(Request $request): JsonResponse
    {
        $location = explode(',', $request->get('location'));

        array_walk($location, 'trim');

        dd($location);
    }
}
