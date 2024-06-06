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
        Schema::create('car_works', function (Blueprint $table) {
            $table->uuid('id')->primary()->comment('Уникальный идентификатор работы');
            $table->string('name')->comment('Наименование работы');
            $table->decimal('price', 8, 2)->comment('Стоимость');
            $table->integer('time')->comment('Время выполнения работ в минутах');
            $table->timestamps();
        });

        DB::statement("ALTER TABLE car_works COMMENT 'Таблица стоимости работ для автомобилей'");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('car_work');
    }
};
