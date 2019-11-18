<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShopsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shops', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('address')->nullable(true);
            $table->string('phone')->nullable(true);
            $table->string('latitude')->nullable(true);  //широта
            $table->string('longitude')->nullable(true); //долгота
            $table->string('region')->nullable(true); // Название города или области магазина
            $table->string('opening_time')->nullable(true); //Время открытия магазина
            $table->string('closing_phone')->nullable(true); //Время закрытия магазина
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('shops');
    }
}
