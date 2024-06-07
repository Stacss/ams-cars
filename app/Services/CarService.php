<?php

namespace App\Services;

use App\Models\CarModel;
use Illuminate\Support\Facades\DB;

class CarService
{
    /**
     * Получает список всех автомобилей с их марками.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getAllCars()
    {
        return CarModel::with('brand')->get();
    }

    /**
     * Получает список автомобилей, снятых с производства до сентября 2010 года.
     *
     * @return \Illuminate\Support\Collection
     */
    public function getOldCars()
    {
        $cars = CarModel::where('date_end', '<=', '2010-09-01')
            ->whereNotNull('date_end')
            ->with('brand')
            ->get(['id', 'brand_id', 'name', 'date_end', 'image_url', 'class']);

        return $cars->map(function ($car) {
            return [
                'id' => $car->id,
                'brand' => $car->brand->name,
                'model' => $car->name,
                'date_end' => $car->date_end,
                'image_url' => $car->image_url,
                'class' => $car->class,
            ];
        });
    }

    /**
     * Получает список автомобилей, не снятых с производства на текущий момент,
     * и стоимость работ для которых выше 1000 рублей.
     *
     * @return \Illuminate\Support\Collection
     */
    public function getCurrentCarsWithExpensiveWorks()
    {
        $currentDate = now();

        $cars = CarModel::whereNull('date_end')
            ->orWhere('date_end', '>', $currentDate)
            ->whereHas('works', function ($query) {
                $query->where('price', '>', 1000);
            })
            ->with(['brand', 'works' => function ($query) {
                $query->where('price', '>', 1000);
            }])
            ->get();

        return $cars->flatMap(function ($car) {
            return $car->works->map(function ($work) use ($car) {
                return [
                    'brand' => $car->brand->name,
                    'model' => $car->name,
                    'work_name' => $work->name,
                    'work_price' => $work->price,
                    'image_url' => $car->image_url,
                    'class' => $car->class,
                ];
            });
        });
    }
}
