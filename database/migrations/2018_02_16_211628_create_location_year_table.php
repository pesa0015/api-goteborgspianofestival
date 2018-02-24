<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLocationYearTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('location_year', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('year_id')->nullable()->unsigned();
            $table->integer('location_id')->nullable()->unsigned();
            $table->timestamps();

            $table->foreign('year_id')->references('id')->on('years');
            $table->foreign('location_id')->references('id')->on('locations');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('location_year');
    }
}
