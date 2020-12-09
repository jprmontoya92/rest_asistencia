<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class IdentificadoresMigration extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('identificadores', function (Blueprint $table) {
            $table->string('ident_id',255)->unique();
            $table->integer('ident_pto_id');
            $table->foreign('ident_pto_id')->references('pto_id')->on('pto_ubicaciones');
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
        Schema::dropIfExists('identificadores');
    }
}
