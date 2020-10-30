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
            $table->integer('reg_id')->unique();
            $table->string('reg_ident_id',255)->unique();
            $table->date('reg_fecha');
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
