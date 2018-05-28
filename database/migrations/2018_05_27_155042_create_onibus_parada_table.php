<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOnibusParadaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('onibus_parada', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('onibus_id')->unsigned();
            $table->integer('parada_id')->unsigned();
            $table->foreign('onibus_id')->references('id')->on('onibus');
            $table->foreign('parada_id')->references('id')->on('paradas');
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
        Schema::dropIfExists('onibus_parada');
    }
}
