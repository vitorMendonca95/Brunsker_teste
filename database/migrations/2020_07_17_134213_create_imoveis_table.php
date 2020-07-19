<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateImoveisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('imoveis', function (Blueprint $table) {
            $table->id('cd_imovel');
            $table->string('ds_imovel');
            $table->integer('qt_quarto')->unsigned();         
            $table->double('metros_quadrados', 8, 2);
            $table->bigInteger('cd_bairro')->unsigned();
            $table->foreign('cd_bairro')->references('cd_bairro')->on('bairros');
            $table->bigInteger('cd_uf')->unsigned();
            $table->foreign('cd_uf')->references('cd_uf')->on('uf');
            $table->bigInteger('cd_cidade')->unsigned();
            $table->foreign('cd_cidade')->references('cd_cidade')->on('cidades');
 
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
        Schema::dropIfExists('imoveis');
    }
}
