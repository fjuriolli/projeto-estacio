<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAneisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('aneis', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('linha_id')->unsigned();
            $table->string('nome');
            $table->float('tarifa');

            $table->foreign('linha_id')->references('id')
                ->on('linhas')
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
        Schema::dropIfExists('aneis');
    }
}
