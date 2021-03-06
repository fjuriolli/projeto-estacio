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
            $table->integer('anel_id')->unsigned()->nullable();
            $table->integer('evento_id')->unsigned()->nullable();
            $table->string('nome');
            $table->string('classificacao');

            $table->foreign('anel_id')->references('id')
                ->on('aneis')
                ->onDelete('cascade');

            $table->foreign('evento_id')->references('id')
                ->on('eventos')
                ->onDelete('cascade');
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
