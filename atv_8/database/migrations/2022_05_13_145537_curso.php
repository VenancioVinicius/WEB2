<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Curso extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
    
        Schema::create('cursos', function (Blueprint $table) {
            $table->string('nome');
            $table->string('sigla');
            $table->integer('tempo');
            $table->string('eixo_nome');
            //$table->unsignedBigInteger('eixo_id')->references('id')->on('eixos');
            $table->foreign('eixo_nome')->references('nome')->on('eixos');
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
        Schema::dropIfExists('cursos');
    }
}
