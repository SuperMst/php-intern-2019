<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cars', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('manufacturer');
            $table->string('model');
            $table->year('year');
            $table->string('vin');
            $table->string('registration_number');
            $table->string('fuel_type');
            $table->string('body_style');
            $table->string('gearbox_type');
            $table->float('rent_price');
            $table->integer('times_rented')->default('0');
            $table->boolean('in_service')->default('0');
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
        Schema::dropIfExists('cars');
    }
}
