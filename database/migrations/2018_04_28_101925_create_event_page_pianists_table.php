<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventPagePianistsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('event_page_pianist', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('event_page_id')->nullable()->unsigned();
            $table->integer('pianist_id')->nullable()->unsigned();
            $table->text('bio')->nullable();
            $table->string('img', 150)->nullable();

            $table->foreign('event_page_id')->references('id')->on('event_pages');
            $table->foreign('pianist_id')->references('id')->on('pianists');
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
        Schema::dropIfExists('event_page_pianist');
    }
}
