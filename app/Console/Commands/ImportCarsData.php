<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ImportCarsData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'import:cars';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Импорт данных машин из файла';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $filePath = base_path('cars.json');
        if (!file_exists($filePath)) {
            $this->error('Файл не найден.');
            return 1;
        }

        $json = file_get_contents($filePath);
        $data = json_decode($json, true);

        DB::transaction(function () use ($data) {
            foreach ($data as $brand) {
                $brandId = Str::uuid();

                DB::table('car_brands')->insert([
                    'id' => $brandId,
                    'name' => $brand['name'],
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);

                foreach ($brand['models'] as $model) {
                    if (!in_array($model['class'], ['A', 'B', 'J'])) {
                        continue;
                    }

                    $modelId = Str::uuid();
                    $dateStart = $this->generateRandomDate($model['year-from']);
                    $dateEnd = $model['year-to'] ? $this->generateRandomDate($model['year-to']) : null;

                    DB::table('car_models')->insert([
                        'id' => $modelId,
                        'brand_id' => $brandId,
                        'name' => $model['name'],
                        'date_start' => $dateStart,
                        'date_end' => $dateEnd,
                        'class' => $model['class'],
                        'image_url' => null,
                        'created_at' => now(),
                        'updated_at' => now(),
                    ]);
                }
            }
        });

        $this->info('Импорт данных прошел успешно.');
        return 0;
    }

    /**
     * Генерирует случайную дату в формате год-месяц-день на основе заданного года.
     *
     * @param int $year Год, который будет использован для генерации даты.
     * @return string Случайно сгенерированная дата в формате "год-месяц-день".
     */
    private function generateRandomDate($year)
    {
        $month = rand(1, 12);
        $day = rand(1, 28);
        return "$year-$month-$day";
    }
}
