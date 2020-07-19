@extends('adminlte::page')


@section('content')


<!DOCTYPE html>

<html lang="pt-br">
    <head>

        <meta charset="utf-8" />   
        <meta name="csrf-token" content="{{ csrf_token() }}" />
        <title>Angular Demo</title>


        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.13/jquery.mask.js"></script>
        <script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js"></script>
        <script src="{{ asset('js/LocacaoImoveisController.js')}}"></script>

    </head>

    <body ng-app="AngularApp">

        <div ng-controller="HelloController" >
        <div>
            <h3>Anunciar Imovel</h3>
        </div>

        <hr><br>

        <div class="container">
            <div class="row">
                <div class="col-sm-5">
                    <form>
                        <div class="form-group">
                            <label for="estado">Título anuncio</label>
                            <input class="form-control" type="text" required ng-model = "imovel.titulo"/>
                        </div>

                        <div class="form-group">
                                <label for="estado">Descrição do imóvel</label>
                                <textarea class="form-control" cols="30" rows="10" ng-model = "imovel.descricao"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="estado">Estado</label>
                            <select
                                class="form-control"
                                ng-model = "imovel.estadoSelecionado"
                                >
                                <option ng-repeat = "it in estados" value="@{{it.cd_uf}}"> @{{ it.ds_uf_nome }} </option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="cidade">Cidade</label>
                            <select
                                class="form-control"
                                ng-model = "imovel.cidadeSelecionada"
                            >
                                <option ng-repeat = "it in cidades" value="@{{it.cd_cidade}}"> @{{ it.ds_cidade_nome }} </option>
                            </select>
                        </div>
                    
                        <div class="form-group">
                            <label for="bairros">Bairros</label>
                            <select
                                class="form-control"
                                ng-model = "imovel.bairroSelecionado"
                            >
                                <option ng-repeat = "it in bairros" value="@{{it.cd_bairro}}"> @{{ it.ds_bairro_nome }} </option>
                            </select>
                        </div>
                    
                        <div class="form-group">
                            <label for="tipo">Tipo do anuncio</label>
                            <select
                                class="form-control"
                                ng-model = "imovel.tipoAnuncioSelecionado"
                            >
                                <option ng-repeat = "it in tipoAnuncio" value="@{{it.id_tipo_anuncio}}"> @{{ it.ds_tipo_anuncio }} </option>
                            </select>
                        </div>


                        <div class="form-group">
                            <label for="quartos">Quartos</label>
                            <input ng-model = "imovel.numQuartos" class="form-control input-sm" type="number" min="1" step="1" required/>
                        </div>                
                        <div class="form-group">
                            <label for="metroQuad">Metros quadrados (m²)</label>
                            <input class="form-control" ng-model = "imovel.metrosQuadrados" type="number" min="1" required/>
                        </div>

                        <div class="form-group">
                            <label for="preco">Preço</label>
                            <input class="real form-control" ng-model = "imovel.preco" id ="vd_ga" type="text" min="0.01" required/>
                        </div>
                        <br>
                        <button type="submit" class="btn btn-primary" ng-click = "salvarAnuncioImovel(imovel)">Enviar</button>

                        <br>
                        <br>

                        <div class="alert alert-success alert-dismissible fade show" role="alert" style = "display: none;">
                                 Anuncio salvo com sucesso!
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                        </div>

                    </form>     
                </div>
            </div>
          </div>
        </div>

    </body>

    </html>

@endsection