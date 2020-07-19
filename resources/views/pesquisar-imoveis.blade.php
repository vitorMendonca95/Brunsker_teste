@extends('adminlte::page')


@section('content')


<!DOCTYPE html>

<html lang="pt-br">
    <head>

        <meta charset="utf-8" />   
        <meta name="csrf-token" content="{{ csrf_token() }}" />

        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.13/jquery.mask.js"></script>
        <script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js"></script>
        <script src="{{ asset('js/LocacaoImoveisController.js')}}"></script>

    </head>

    <body ng-app="AngularApp">

        <div ng-controller="HelloController" ng-init= "listarAnuncios()">
            
            <div>
                <h3>Lista anuncios</h3>
            </div>

            <hr><br>    


            <!-- 'imoveis.cd_imovel',
                    'imoveis.ds_imovel',
                    'imoveis.qt_quarto',
                    'imoveis.metros_quadrados',
                    'imoveis.preco',
                    'imoveis.titulo_imovel',
                    'uf.ds_uf_sigla',
                    'cidades.ds_cidade_nome',
                    'bairros.ds_bairro_nome',
                    'tipo_anuncio.ds_tipo_anuncio' -->

            <table class="table table-sm table-responsive-sm align-middle">
                <thead>
                  <tr>
                    <th scope="col" class="">#</th>
                    <th scope="col">Titulo</th>
                    <th scope="col">Nº Quartos</th>
                    <th scope="col">M²</th>
                    <th scope="col">Razão</th>
                    <th scope="col">Valor</th>
                    <th scope="col">Estado</th>
                    <th scope="col">Cidade</th>
                    <th scope="col">Bairro</th>
                    <th scope= "col">Acões</th>
                  </tr>
                </thead>
                <tbody>
                  <tr ng-repeat = "x in listaAnuncios">
                    <td> @{{x.cd_imovel}}</td>
                    <td> @{{x.titulo_imovel}}</td>
                    <td> @{{x.qt_quarto}}</td>
                    <td> @{{x.metros_quadrados}}</td>
                    <td> @{{x.ds_tipo_anuncio}}</td>
                    <td> @{{x.preco}}</td>
                    <td> @{{it.ds_uf_sigla}}</td>
                    <td> @{{x.ds_cidade_nome}}</td>
                    <td> @{{x.ds_bairro_nome}}</td>
                    <td>
                        <button type="button" class="btn btn-primary" ng-click = "detalharAnuncio(x.cd_imovel)" data-toggle="modal" data-target="#modal-editar-anuncio">Editar</button>
                        <button type="button" class="btn btn-danger" ng-click = "deletarAnuncio(x.cd_imovel)" data-toggle="modal" data-target="#exampleModal">Excluir</button>
                    </td>
                  </tr>
                </tbody>
              </table>

              <div class="modal fade" id="modal-editar-anuncio" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" >New message</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                </div>
                
                <div class="modal-body">
                    <form>
                            <div class="form-group">
                                    <label for="estado">Título anuncio</label>
                                    <input class="form-control" type="text" required ng-model = "detalhesImovel.titulo"/>
                                </div>
        
                                <div class="form-group">
                                        <label for="estado">Descrição do imóvel</label>
                                        <textarea class="form-control" cols="30" rows="10" ng-model = "detalhesImovel.descricao"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="estado">Estado</label>
                                    <select
                                        class="form-control"
                                        ng-model = "detalhesImovel.estadoSelecionado"
                                        ng-options = "it.cd_uf as it.ds_uf_nome for it in estados"
                                        >
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="cidade">Cidade</label>
                                    <select
                                        class="form-control"
                                        ng-model = "detalhesImovel.cidadeSelecionada"
                                        ng-options = "it.cd_cidade as it.ds_cidade_nome for it in cidades"
                                    >
                                    </select>
                                </div>
                            
                                <div class="form-group">
                                    <label for="bairros">Bairros</label>
                                    <select
                                        class="form-control"
                                        ng-model = "detalhesImovel.bairroSelecionado"
                                        ng-options = "it.cd_bairro as it.ds_bairro_nome for it in bairros"
                                    >
                                    </select>
                                </div>
                            
                                <div class="form-group">
                                    <label for="tipo">Tipo do anuncio</label>
                                    <select
                                        class="form-control"
                                        ng-model = "detalhesImovel.tipoAnuncioSelecionado"
                                        ng-options = "it.id_tipo_anuncio as it.ds_tipo_anuncio for it in tipoAnuncio"
                                    >
                                    </select>
                                </div>
        
        
                                <div class="form-group">
                                    <label for="quartos">Quartos</label>
                                    <input ng-model = "detalhesImovel.numQuartos" class="form-control input-sm" type="number" min="1" step="1" required/>
                                </div>                
                                <div class="form-group">
                                    <label for="metroQuad">Metros quadrados (m²)</label>
                                    <input class="form-control" ng-model = "detalhesImovel.metrosQuadrados" type="number" min="1" required/>
                                </div>
        
                                <div class="form-group">
                                    <label for="preco">Preço</label>
                                    <input class="real form-control" ng-model = "detalhesImovel.preco" id ="vd_ga" type="text" min="0.01" required/>
                                </div>
                                <br>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" ng-click = "editarImovel(detalhesImovel)" data-dismiss="modal">Editar Anuncio</button>
                </div>
            </div>
        </div>

        </div>       
    </div>



    </body>

    </html>

@endsection