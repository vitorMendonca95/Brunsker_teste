<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Estados;
use App\Cidades;
use App\Bairros;
use App\TipoAnuncio;
use App\Imoveis;
use function GuzzleHttp\json_encode;

class LocacaoImoveisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function detalharAnuncios($id){
        $dadosDetalhesAnuncio = Imoveis::/*select(
            'imoveis.ds_imovel' ,
            'imoveis.qt_quarto',
            'imoveis.metros_quadrados',
            'imoveis.preco',
            'imoveis.titulo_imovel',
            'imoveis.cd_uf',
            'imoveis.cd_cidade',
            'imoveis.cd_bairro'
        )->*/where('cd_imovel', $id)->get()->first();

        return json_encode($dadosDetalhesAnuncio);

    }

    public function editarImovel(Request $request){
        $dadosImovel = $request;
        Imoveis::editarImovel($dadosImovel);

    }


    public function listarAnuncios(){
    
          
        $listaImoveis = Imoveis::listarImoveis();
        
        return json_encode($listaImoveis);     

    }


    public function listardependenciasAnuncio(){
        $estadosCidadesBairros = [];

        $estados = Estados::get();
        $cidades = Cidades::get();
        $bairros = Bairros::get();
        $tipoAnuncio = TipoAnuncio::get();
        
        $dependenciasAnuncio = [
            'estados'       => $estados,
            'cidades'       => $cidades,
            'bairros'       => $bairros,
            'tipoAnuncio'   => $tipoAnuncio  
        ];
        
        return json_encode($dependenciasAnuncio);

    }

    public function salvarAnuncio(Request $request){
        $dadosImoveis = $request->all();

        $imovel = new Imoveis;

        $imovel->titulo_imovel = $dadosImoveis['titulo'];
        $imovel->ds_imovel = $dadosImoveis['descricao']; 
        $imovel->qt_quarto = $dadosImoveis['numQuartos'];
        $imovel->metros_quadrados = $dadosImoveis['metrosQuadrados'];
        $imovel->cd_bairro = $dadosImoveis['bairro'];
        $imovel->cd_uf = $dadosImoveis['estado'];
        $imovel->cd_cidade = $dadosImoveis['cidade'];
        $imovel->preco = $dadosImoveis['preco'];
        $imovel->id_tipo_anuncio = $dadosImoveis['tipoAnuncio'];

        $imovel->save();

    }

    public function deletarImovel($id){
        Imoveis::where('cd_imovel', $id)->delete();
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
