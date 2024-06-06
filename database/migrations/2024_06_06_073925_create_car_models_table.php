<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('car_models', function (Blueprint $table) {
            $table->uuid('id')->primary()->comment('Уникальный идентификатор');
            $table->uuid('brand_id')->comment('Связь с таблицей марок автомобилей');
            $table->string('name')->comment('Модель автомобиля, например: Solaris');
            $table->date('date_start')->nullable()->comment('Дата начала производства');
            $table->date('date_end')->nullable()->comment('Дата окончания производства');
            $table->enum('class', ['A', 'B', 'J'])->comment('Тип кузова: A — хэчбэк, B — седан, J — джип');
            $table->string('image_url')->nullable()->comment('Ссылка на изображение модели');
            $table->timestamps();

            $table->foreign('brand_id')->references('id')->on('car_brands');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('car_models');
    }
};
