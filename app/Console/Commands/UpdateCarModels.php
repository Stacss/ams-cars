<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class UpdateCarModels extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'update:car-models-img';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Обновление случайными картинками маоделей авто';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $carModels = DB::table('car_models')->get();

        $updateData = [];

        function getRandomImageName($folder)
        {
            $path = base_path($folder);
            $files = glob($path . '/*');

            if (empty($files)) {
                throw new \Exception("No files found in the folder: $folder");
            }

            return $files[array_rand($files)];
        }

        foreach ($carModels as $carModel) {
            switch ($carModel->class) {
                case 'A':
                    $randomImage = getRandomImageName('resources/img/hb');
                    $updateData[] = ['id' => $carModel->id, 'image_url' => 'hb/' . basename($randomImage)];
                    break;
                case 'B':
                    $randomImage = getRandomImageName('resources/img/sed');
                    $updateData[] = ['id' => $carModel->id, 'image_url' => 'sed/' . basename($randomImage)];
                    break;
                case 'J':
                    $randomImage = getRandomImageName('resources/img/jeep');
                    $updateData[] = ['id' => $carModel->id, 'image_url' => 'jeep/' . basename($randomImage)];
                    break;
            }
        }

        foreach ($updateData as $data) {
            DB::table('car_models')
                ->where('id', $data['id'])
                ->update(['image_url' => $data['image_url']]);
        }

        $this->info('Картинки успешно записаны.');
    }
}
