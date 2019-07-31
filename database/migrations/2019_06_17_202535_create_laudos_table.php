<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLaudosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('laudos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('oficio', 20);
            $table->string('rep', 15);
            $table->date('data_solicitacao');
            $table->date('data_designacao');
            $table->integer('secao_id')->unsigned();
            $table->foreign('secao_id')->references('id')->on('secoes');
            $table->integer('cidade_id')->unsigned();
            $table->foreign('cidade_id')->references('id')->on('cidades');
            $table->integer('solicitante_id')->unsigned();
            $table->foreign('solicitante_id')->references('id')->on('orgaos_solicitantes');
            $table->integer('perito_id')->unsigned();
            $table->foreign('perito_id')->references('id')->on('users');
            $table->integer('diretor_id')->unsigned();
            $table->foreign('diretor_id')->references('id')->on('diretores');
            $table->string('indiciado', 30);
            $table->string('inquerito', 15);
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
        Schema::dropIfExists('laudos');
    }
}
