<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRentalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rentals', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('Car_id');
            $table->foreign('Car_id')->references('id')->on('cars');
            $table->unsignedBigInteger('Owner_id');
            $table->foreign('Owner_id')->references('id')->on('users');
            $table->unsignedBigInteger('Renter_id');
            $table->foreign('Renter_id')->references('id')->on('users');
            $table->string('City');
            $table->foreign('City')->references('City')->on('cars');
            $table->date('Start_date');
            $table->date("End_Date");
            $table->string("Paid");
            $table->float("TMoney");
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
        Schema::dropIfExists('rentals');
    }
}
