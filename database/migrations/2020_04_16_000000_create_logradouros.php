<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLogradouros extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('logradouros', function (Blueprint $table) {
            $table->id('cd_logradouro');
            $table->bigInteger('cd_bairro')->unsigned();
            $table->foreign('cd_bairro')->references('cd_bairro')->on('bairros');
            $table->string('ds_logradouro');
            $table->string('ds_logradouro_nome');
            $table->string('no_logradouro_cep');
            $table->timestamps();
        });

        //CD_LOGRADOURO,CD_BAIRRO,CD_TIPO_LOGRADOUROS,DS_LOGRADOURO_NOME,NO_LOGRADOURO_CEP
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('logradouros');
    }
}
