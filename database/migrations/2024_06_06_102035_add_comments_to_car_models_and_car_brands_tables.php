<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        DB::statement("ALTER TABLE car_models COMMENT 'Таблица моделей автомобилей'");
        DB::statement("ALTER TABLE car_brands COMMENT 'Таблица марок автомобилей'");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::statement("ALTER TABLE car_models COMMENT ''");
        DB::statement("ALTER TABLE car_brands COMMENT ''");
    }
};
