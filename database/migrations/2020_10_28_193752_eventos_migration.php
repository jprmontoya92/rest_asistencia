<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class EventosMigration extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('eventos', function (Blueprint $table) {
            $table->increments('even_id')->unique();
            $table->string('even_tipo');
            $table->date('even_fecha')->nullable();
            $table->foreignId('even_usu_rut');
            $table->foreign('even_usu_rut')->references('usu_rut')->on('usuarios');
            $table->double('even_lat');
            $table->double('even_lng');
            $table->string('even_ident_id',255);
            $table->foreign('even_ident_id')->references('ident_id')->on('identificadores');
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
        Schema::dropIfExists('eventos');
    }
}
