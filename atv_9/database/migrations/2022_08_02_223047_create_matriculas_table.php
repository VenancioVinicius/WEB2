<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMatriculasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('matriculas', function (Blueprint $table) {
            //$table->id();

            $table->unsignedBigInteger('aluno_id');

            $table->foreign('aluno_id')->references('id')->on('alunos');

            $table->unsignedBigInteger('diciplina_id');

            $table->foreign('diciplina_id')->references('id')->on('diciplinas');

            $table->primary(['aluno_id', 'diciplina_id']);

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
        Schema::dropIfExists('matriculas');
    }
}
