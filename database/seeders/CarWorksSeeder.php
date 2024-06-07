<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CarWorksSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $works = [
            [
                'id' => Str::uuid(),
                'name' => 'Замена масла',
                'price' => 500.00,
                'time' => 30,
            ],
            [
                'id' => Str::uuid(),
                'name' => 'Замена тормозных колодок',
                'price' => 1500.00,
                'time' => 60,
            ],
            [
                'id' => Str::uuid(),
                'name' => 'Регулировка клапанов',
                'price' => 1000.00,
                'time' => 45,
            ],
            [
                'id' => Str::uuid(),
                'name' => 'Замена воздушного фильтра',
                'price' => 400.00,
                'time' => 15,
            ],
            [
                'id' => Str::uuid(),
                'name' => 'Замена рычага задней подвески',
                'price' => 1500.00,
                'time' => 45,
            ],
            [
                'id' => Str::uuid(),
                'name' => 'Развал-схождение',
                'price' => 100.00,
                'time' => 60,
            ],
            [
                'id' => Str::uuid(),
                'name' => 'Замена шаровой опоры',
                'price' => 1000.00,
                'time' => 45,
            ],
        ];

        foreach ($works as $work) {
            DB::table('car_works')->insert($work);
        }
    }
}
