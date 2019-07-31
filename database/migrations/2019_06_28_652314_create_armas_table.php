<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArmasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('armas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('tipo_arma', 30);
            $table->integer('marca_id')->unsigned();
            $table->foreign('marca_id')->references('id')->on('marcas');
            $table->integer('calibre_id')->unsigned();
            $table->foreign('calibre_id')->references('id')->on('calibres');
            $table->integer('origem_id')->unsigned();
            $table->foreign('origem_id')->references('id')->on('origens');
            $table->integer('laudo_id')->unsigned();
            $table->foreign('laudo_id')->references('id')->on('laudos');
            $table->string('tipo_serie', 30);
            $table->string('num_serie', 30)->nullable();
            $table->string('tambor_rebate', 30);
            $table->integer('capacidade_tambor');
            $table->string('sistema_percussao', 30);
            $table->string('tipo_acabamento', 30);
            $table->string('estado_geral', 30);
            $table->string('comprimento_total', 10);
            $table->string('comprimento_cano', 10);
            $table->string('altura', 10);
            $table->integer('quantidade_raias');
            $table->string('sentido_raias', 30);
            $table->string('num_lacre', 15);
            $table->string('cabo', 30);
            $table->string('funcionamento', 15);
            $table->string('ref_image', 30)->nullable();
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
        Schema::dropIfExists('armas');
    }
}
