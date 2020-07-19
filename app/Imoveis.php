<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class Imoveis extends Model
{
    protected $table = 'imoveis';


    public static function listarImoveis(){
        $lista = DB::table('imoveis')
            ->join('uf', 'imoveis.cd_uf' , '=', 'uf.cd_uf')
            ->join('cidades', 'imoveis.cd_cidade', '=', 'cidades.cd_cidade')
            ->join('bairros', 'imoveis.cd_bairro', '=', 'bairros.cd_bairro')
            ->join('tipo_anuncio', 'imoveis.id_tipo_anuncio', '=', 'tipo_anuncio.id_tipo_anuncio')
            ->select('imoveis.cd_imovel',
                    'imoveis.ds_imovel',
                    'imoveis.qt_quarto',
                    'imoveis.metros_quadrados',
                    'imoveis.preco',
                    'imoveis.titulo_imovel',
                    'uf.ds_uf_sigla',
                    'cidades.ds_cidade_nome',
                    'bairros.ds_bairro_nome',
                    'tipo_anuncio.ds_tipo_anuncio')
            ->orderBy('imoveis.cd_imovel')                    
            ->get();
            
            return $lista;
    }

    public static function editarImovel($dadosImovel){
        DB::table('imoveis')->where('cd_imovel', $dadosImovel->idImovel)
        ->update([
            'cd_bairro' => $dadosImovel->bairro,
            'cd_cidade' => $dadosImovel->cidade,
            'ds_imovel' => $dadosImovel->descricao,
            'cd_uf' => $dadosImovel->estado,
            'metros_quadrados' => $dadosImovel->metrosQuadrados,
            'qt_quarto' => $dadosImovel->numQuartos,
            'preco' => $dadosImovel->preco,
            'id_tipo_anuncio' => $dadosImovel->tipoAnuncio,
            'titulo_imovel' => $dadosImovel->titulo
        ]);

    /*

    idImovel: $scope.detalhesImovel.id_imovel,
                  bairro: dadosImovel.bairroSelecionado,
                  cidade: dadosImovel.cidadeSelecionada,
                  descricao: dadosImovel.descricao,
                  estado: dadosImovel.estadoSelecionado,
                  metrosQuadrados: dadosImovel.metrosQuadrados,
                  numQuartos: dadosImovel.numQuartos,
                  preco: dadosImovel.preco,
                  tipoAnuncio: dadosImovel.tipoAnuncioSelecionado,
                  titulo: dadosImovel.titulo

    */
    }
    
}
