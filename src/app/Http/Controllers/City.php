<?php

namespace App\Http\Controllers;

use App\Models\City as CityModel;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class City extends Controller
{
    /**
     * @var CityModel
     */
    private $model;

    public function __construct(CityModel $model)
    {
        $this->model = $model;
    }

    public function index(Request $request): JsonResponse
    {
        return response()->json(
            $this->model->where('name', 'like', $request->get('city') . '%')->get()->toArray()
        );
    }
}
