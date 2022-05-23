<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCarModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cars', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('Owner_id');
            $table->foreign('Owner_id')->references('id')->on('users');
            $table->string('Brand');
            $table->foreign('Brand')->references('Brand')->on('car_brands');
            $table->string('Information');
            $table->float('Price');
            $table->string('Model');
            $table->string('Image');
            $table->string('Status');
            $table->string('AC');
            $table->string('Type');
            $table->string('Trans');
            $table->string('City');
            $table->foreign('City')->references('City')->on('offices');
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
        Schema::dropIfExists('car_models');
    }
}