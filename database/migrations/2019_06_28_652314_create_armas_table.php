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
            $table->foreign('laudo_id')->references('id')->on('laudos')->onDelete('cascade');
            $table->string('tipo_serie', 40);
            $table->string('num_serie', 30)->nullable();
            $table->string('tambor_rebate', 15)->nullable();
            $table->integer('capacidade_tambor')->nullable();
            $table->string('sistema_percussao', 30)->nullable();
            $table->string('tipo_acabamento', 40)->nullable();
            $table->string('estado_geral', 25)->nullable();
            $table->string('comprimento_total', 10)->nullable();
            $table->string('comprimento_cano', 10)->nullable();
            $table->string('altura', 10)->nullable();
            $table->integer('quantidade_raias');
            $table->string('sentido_raias', 30)->nullable();
            $table->string('num_lacre', 20)->nullable();
            $table->string('cabo', 40)->nullable();
            $table->string('funcionamento', 25)->nullable();
            $table->string('sistema_funcionamento', 25)->nullable();
            $table->string('num_canos', 15)->nullable();
            $table->string('disposicao_canos', 40)->nullable();
            $table->string('teclas_gatilho', 25)->nullable();
            $table->string('sistema_carregamento', 40)->nullable();
            $table->string('sistema_engatilhamento', 40)->nullable();
            $table->string('coronha_fuste', 40)->nullable();
            $table->string('chave_abertura', 70)->nullable();
            $table->string('tipo_carregador', 40)->nullable();
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
