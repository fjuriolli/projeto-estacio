<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItinerarioLogradouroTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('itinerario_logradouro', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('itinerario_id')->unsigned();
            $table->integer('logradouro_id')->unsigned();
            $table->foreign('itinerario_id')->references('id')->on('itinerarios');
            $table->foreign('logradouro_id')->references('id')->on('logradouros');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('itinerario_logradouro');
    }
}
