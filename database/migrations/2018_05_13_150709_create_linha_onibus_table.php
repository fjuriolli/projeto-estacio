<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLinhaOnibusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('linha_onibus', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('linha_id')->unsigned();
            $table->integer('onibus_id')->unsigned();
            $table->foreign('linha_id')->references('id')->on('linhas');
            $table->foreign('onibus_id')->references('id')->on('onibus');
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
        Schema::dropIfExists('linha_onibus');
    }
}
