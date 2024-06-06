<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('car_model_work', function (Blueprint $table) {
            $table->uuid('car_model_id')->comment('Идентификатор модели автомобиля');
            $table->uuid('car_work_id')->comment('Идентификатор работы');
            $table->timestamps();

            $table->foreign('car_model_id')->references('id')->on('car_models')->onDelete('cascade');
            $table->foreign('car_work_id')->references('id')->on('car_works')->onDelete('cascade');
            $table->primary(['car_model_id', 'car_work_id']);
        });

        DB::statement("ALTER TABLE car_model_work COMMENT 'Связующая таблица между моделями автомобилей и стоимостью работ'");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('car_model_work');
    }
};
