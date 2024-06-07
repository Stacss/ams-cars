<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/car1', function () {
    return view('getDataCar');
});

Route::get('/car2', function () {
    return view('dataNewCar');
});
