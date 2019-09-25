<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateComponentesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('componentes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('laudo_id')->unsigned()->nullable();
            $table->foreign('laudo_id')->references('id')->on('laudos');
            $table->string('quantidade',10)->nullable();
            $table->smallInteger('quantidade_frascos')->nullable();
            $table->string('componente',40)->nullable();
            $table->float('tamanho',8,2)->nullable();
            $table->string('material_frascos',40)->nullable();
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
        Schema::dropIfExists('componentes');
    }
}
