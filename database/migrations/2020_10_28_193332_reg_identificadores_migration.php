<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RegIdentificadoresMigration extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reg_identificadores', function (Blueprint $table) {
            $table->increments('reg_id')->unique();
            $table->string('reg_ident_id',255);
            $table->dateTime('reg_fecha_ini');
            $table->dateTime('reg_fecha_fin');
            $table->foreign('reg_ident_id')->references('ident_id')->on('identificadores');
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
        Schema::dropIfExists('reg_identificadores');
    }
}
