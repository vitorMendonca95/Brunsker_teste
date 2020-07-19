<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatEBairros extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bairros', function (Blueprint $table) {
            $table->id('cd_bairro');
            $table->bigInteger('cd_cidade')->unsigned();
            $table->foreign('cd_cidade')->references('cd_cidade')->on('cidades');
            $table->string('ds_bairro_nome');
            $table->timestamps();
        });

        //cd_bairro, cd_cidade, ds_bairro_nome
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
