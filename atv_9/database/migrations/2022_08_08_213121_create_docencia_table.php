<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDocenciaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('docencia', function (Blueprint $table) {

            $table->id();

            $table->unsignedBigInteger('id_diciplina');

            $table->unsignedBigInteger('id_professor');

            $table->foreign('id_diciplina')->references('id')->on('diciplinas');

            $table->foreign('id_professor')->references('id')->on('professors');

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
        Schema::dropIfExists('docencia');
    }
}
