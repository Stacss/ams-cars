<?php

namespace Database\Seeders;

use App\Models\CarModel;
use App\Models\CarWork;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CarModelWorkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $carModels = CarModel::all();
        $carWorks = CarWork::all();

        $modelsWorks = [];
        foreach ($carModels as $carModel) {
            foreach ($carWorks as $carWork) {
                $modelsWorks[] = [
                    'car_model_id' => $carModel->id,
                    'car_work_id' => $carWork->id,
                ];
            }
        }

        DB::table('car_model_work')->insert($modelsWorks);
    }
}
