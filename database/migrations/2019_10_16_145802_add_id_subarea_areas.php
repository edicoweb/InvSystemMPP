<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddIdSubareaAreas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('areas', function ($table) {
            $table->unsignedBigInteger('id_subarea')->nullable();
            $table->foreign('id_subarea')->references('id_area')->on('areas');

        });

    }

    public function down()
    {
        //
        Schema::table('areas', function($table) {
          $table->dropColumn('id_subarea');
        });
    }
}
