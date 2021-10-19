<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEquipoComputosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('equipo_computos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->macAddress('direccion_mac')->unique();
            $table->string('marca',20);
            $table->string('modelo',20);
            $table->string('nombre_equipo',15);
            $table->string('nombre_usuario_equipo',20);
            $table->text('observacion');
            $table->unsignedBigInteger('id_ip');
            $table->unsignedBigInteger('id_funcionario');
            $table->unsignedBigInteger('id_tipo_equipo');
            $table->foreign('id_ip')->references('id_ip')->on('protocolo_internets');
            $table->foreign('id_funcionario')->references('id_funcionario')->on('funcionarios');
            $table->foreign('id_tipo_equipo')->references('id_tipo_equipo')->on('tipo_equipos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('equipo_computos');
    }
}
