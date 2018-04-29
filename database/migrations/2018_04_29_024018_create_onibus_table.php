<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOnibusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('onibus', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('parada_id')->unsigned();
            $table->integer('evento_id')->unsigned();
            $table->string('nome');

            $table->foreign('parada_id')->references('id')
                ->on('paradas')
                ->onDelete('cascade');

                $table->foreign('evento_id')->references('id')
                ->on('eventos')
                ->onDelete('cascade');

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
        Schema::dropIfExists('onibus');
    }
}
