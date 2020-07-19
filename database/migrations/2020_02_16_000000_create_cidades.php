<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCidades extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cidades', function (Blueprint $table) {
            $table->id('cd_cidade');
            $table->bigInteger('cd_uf')->unsigned();
            $table->foreign('cd_uf')->references('cd_uf')->on('uf');
            $table->string('ds_cidade_nome');
            $table->timestamps();
        });

        //cd_uf, cd_cidade, ds_cidade_nome
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cidades');
    }
}
