<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PtoUbicacionesMigration extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pto_ubicaciones', function (Blueprint $table) {
            $table->integer('pto_id')->unique();
            $table->string('pto_nombre');
            $table->text('pto_descripcion');
            $table->float('pto_lat');
            $table->float('pto_lng');
            $table->integer('pto_esta_id');
            $table->foreign('pto_esta_id')->references('esta_id')->on('establecimientos');
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
        Schema::dropIfExists('pto_ubicaciones');
    }
}
