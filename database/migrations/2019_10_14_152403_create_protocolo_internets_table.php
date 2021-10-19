<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProtocoloInternetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('protocolo_internets', function (Blueprint $table) {
            $table->bigIncrements('id_ip');
            $table->ipAddress('ip')->unique();
            $table->text('observacion');
            $table->ipAddress('puerta_enlace');
            //$table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('protocolo_internets');
    }
}
