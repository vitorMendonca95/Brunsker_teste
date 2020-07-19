<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPrecoTableImoveis extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('imoveis', function (Blueprint $table) {
            $table->double('preco', 9, 2);
            $table->bigInteger('id_tipo_anuncio')->unsigned();
            $table->foreign('id_tipo_anuncio')->references('id_tipo_anuncio')->on('tipo_anuncio');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('imoveis', function (Blueprint $table) {
            //
        });
    }
}
