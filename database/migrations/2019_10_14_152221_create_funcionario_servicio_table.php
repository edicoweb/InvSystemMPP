<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFuncionarioServicioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('funcionario_servicio', function (Blueprint $table) {
            $table->bigIncrements('id_sf');
            $table->unsignedBigInteger('id_funcionario');
            $table->unsignedBigInteger('id_servicio');
            $table->foreign('id_funcionario')->references('id_funcionario')->on('funcionarios');
            $table->foreign('id_servicio')->references('id_servicio')->on('servicios');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('funcionario_servicio');
    }
}
