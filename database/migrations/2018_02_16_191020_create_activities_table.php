<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateActivitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('activities', function (Blueprint $table) {
            $table->increments('id');
            $table->string('start');
            $table->string('end');
            $table->string('name');
            $table->string('description')->nullable();
            $table->integer('location_id')->nullable()->unsigned();
            $table->integer('room_id')->nullable()->unsigned();
            $table->integer('day_id')->nullable()->unsigned();
            $table->timestamps();

            $table->foreign('location_id')->references('id')->on('locations');
            $table->foreign('room_id')->references('id')->on('rooms');
            $table->foreign('day_id')->references('id')->on('days');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('activities', function (Blueprint $table) {
            $table->dropForeign('activities_location_id_foreign');
            $table->dropForeign('activities_room_id_foreign');
            $table->dropForeign('activities_day_id_foreign');
        });

        Schema::dropIfExists('activities');
    }
}
