<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Diciplina extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('diciplinas', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->integer('carga');
            $table->unsignedBigInteger('curso_id');
            $table->foreign ('curso_id') -> references('id')->on('eixos');
            $table->softDeletes();
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
        Schema::dropIfExists('diciplinas');
    }
}
