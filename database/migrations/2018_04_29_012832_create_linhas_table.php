<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLinhasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('linhas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('parada_id')->unsigned();
            $table->string('nome');
            $table->integer('qtd_onibus');
            $table->string('classificacao');
            $table->time('horario_saida');
            $table->time('horario_retorno');

            $table->foreign('parada_id')->references('id')
                ->on('paradas')
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
        Schema::dropIfExists('linhas');
    }
}
