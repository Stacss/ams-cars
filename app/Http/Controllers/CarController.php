<?php

namespace App\Http\Controllers;

use App\Models\CarModel;
use Illuminate\Http\Request;

class CarController extends Controller
{
    public function index()
    {
        $cars = CarModel::with('brand')->get();
        return response()->json($cars);
    }

    public function getOldCars()
    {
        $cars = CarModel::where('date_end', '<=', '2010-09-01')
            ->whereNotNull('date_end')
            ->with('brand')
            ->get(['id', 'brand_id', 'name', 'date_end', 'image_url']);

        $carList = $cars->map(function ($car) {
            return [
                'id' => $car->id,
                'brand' => $car->brand->name,
                'model' => $car->name,
                'date_end' => $car->date_end,
                'image_url' => $car->image_url,
            ];
        });

        return response()->json($carList);
    }
}
