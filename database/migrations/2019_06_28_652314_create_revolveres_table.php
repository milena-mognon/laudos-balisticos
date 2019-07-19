<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRevolveresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('revolveres', function (Blueprint $table) {
            $table->increments('id');
            $table->string('tipo_arma');
            $table->integer('marca_id')->unsigned();
            $table->foreign('marca_id')->references('id')->on('marcas');
            $table->integer('calibre_id')->unsigned();
            $table->foreign('calibre_id')->references('id')->on('calibres');
            $table->integer('origem_id')->unsigned();
            $table->foreign('origem_id')->references('id')->on('origens');
            $table->integer('laudo_id')->unsigned();
            $table->foreign('laudo_id')->references('id')->on('laudos');
            $table->string('tipo_serie');
            $table->string('num_serie')->nullable();
            $table->string('tambor_rebate');
            $table->string('capacidade_tambor');
            $table->string('sistema_percussao');
            $table->string('tipo_acabamento');
            $table->string('estado_geral');
            $table->string('comprimento_total');
            $table->string('comprimento_cano');
            $table->string('altura');
            $table->string('quantidade_raias');
            $table->string('sentido_raias');
            $table->string('num_lacre');
            $table->string('cabo');
            $table->string('ref_image')->nullable();
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
        Schema::dropIfExists('revolveres');
    }
}
