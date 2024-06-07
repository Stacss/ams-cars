<?php

namespace App\Http\Controllers;

use App\Models\CarModel;
use App\Services\CarService;
use Illuminate\Http\Request;

class CarController extends Controller
{
    protected $carService;

    public function __construct(CarService $carService)
    {
        $this->carService = $carService;
    }

    /**
     * Получает список всех автомобилей с их марками.
     *
     * @return \Illuminate\Http\JsonResponse Список всех автомобилей с их марками.
     */
    public function index()
    {
        $cars = $this->carService->getAllCars();
        return response()->json($cars);
    }

    /**
     * Получает список автомобилей, снятых с производства до сентября 2010 года.
     * Возвращает данные в формате: id, марка, модель, дата снятия с производства, URL изображения, класс.
     *
     * @return \Illuminate\Http\JsonResponse Список автомобилей, снятых с производства до сентября 2010 года.
     */
    public function getOldCars()
    {
        $carList = $this->carService->getOldCars();
        return response()->json($carList);
    }

    /**
     * Получает список автомобилей, не снятых с производства на текущий момент,
     * и стоимость работ для которых выше 1000 рублей.
     * Возвращает данные в формате: марка, модель, наименование работы, стоимость работы, URL изображения, класс.
     *
     * @return \Illuminate\Http\JsonResponse Список автомобилей и работ, стоимость которых выше 1000 рублей.
     */
    public function currentCarsWithExpensiveWorks()
    {
        $carList = $this->carService->getCurrentCarsWithExpensiveWorks();
        return response()->json($carList);
    }
}
