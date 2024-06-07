<?php

namespace App\Http\Controllers;

use App\Models\CarModel;
use Illuminate\Http\Request;

class CarController extends Controller
{
    public function index()
    {
        $cars = CarModel::all();
        return response()->json($cars);
    }
}
