
var myApp= angular.module("AngularApp",[]);


myApp.controller("HelloController", function($scope){  


    $scope.teste = 'alo';
    $scope.url = window.location.href;

    $scope.dependenciasAnuncio = function(){        

      $.ajax({
          url: $scope.url + "/dependenciasAnuncio",
          type: "get",
          success: function(response){                    
              $scope.dependenciasAnuncio = [];     
              $scope.estados = [];
              $scope.cidades = [];
              $scope.bairros = [];

              $scope.dependenciasAnuncio = JSON.parse(response);         

              $scope.estados = $scope.dependenciasAnuncio.estados;
              $scope.cidades = $scope.dependenciasAnuncio.cidades;
              $scope.bairros = $scope.dependenciasAnuncio.bairros;
              $scope.tipoAnuncio = $scope.dependenciasAnuncio.tipoAnuncio;
          }
      });
  }

    $scope.salvarAnuncioImovel = function(dadosImovel){
     
        $.ajax({
            method: "POST",
              url: $scope.url + "/salvarAnuncio",
              data: { 
                  bairro: dadosImovel.bairroSelecionado,
                  cidade: dadosImovel.cidadeSelecionada,
                  descricao: dadosImovel.descricao,
                  estado: dadosImovel.estadoSelecionado,
                  metrosQuadrados: dadosImovel.metrosQuadrados,
                  numQuartos: dadosImovel.numQuartos,
                  preco: dadosImovel.preco,
                  tipoAnuncio: dadosImovel.tipoAnuncioSelecionado,
                  titulo: dadosImovel.titulo
              },
              headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              },
              success: function(response){
                
                $('.alert').show();
              }
        });

    }

    $scope.listarAnuncios = function(){
        $.ajax({
            url: $scope.url + "/listarAnuncios",
            type: "get",
            async: false,
            success: function(response){
                $scope.listaAnuncios = JSON.parse(response);
                
            }
        });

        console.log($scope.listaAnuncios);
    }

    $scope.detalharAnuncio = function(id){
        $.ajax({
            url: $scope.url + "/detalharAnuncios/" + id,
            type: "get",
            async: false,
            success: function(response){
                detalhesImovelTemp = JSON.parse(response);

                $scope.detalhesImovel = [];

                $scope.detalhesImovel.id_imovel = detalhesImovelTemp.cd_imovel;
                $scope.detalhesImovel.titulo = detalhesImovelTemp.titulo_imovel;
                $scope.detalhesImovel.descricao = detalhesImovelTemp.ds_imovel;
                $scope.detalhesImovel.estadoSelecionado = detalhesImovelTemp.cd_uf;
                $scope.detalhesImovel.cidadeSelecionada = detalhesImovelTemp.cd_cidade;
                $scope.detalhesImovel.bairroSelecionado = detalhesImovelTemp.cd_bairro;
                $scope.detalhesImovel.tipoAnuncioSelecionado = detalhesImovelTemp.id_tipo_anuncio;
                $scope.detalhesImovel.numQuartos = detalhesImovelTemp.qt_quarto;
                $scope.detalhesImovel.metrosQuadrados = detalhesImovelTemp.metros_quadrados;
                $scope.detalhesImovel.preco = detalhesImovelTemp.preco;

            }
        });
    }

    $scope.deletarAnuncio = function(id){
        $.ajax({
            method: "POST",
              url: $scope.url + "/deletarImovel/" + id,
              headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              },
              success: function(response){
                  console.log('.');
                  
              }
        });

        $scope.listarAnuncios();
    }

    $scope.editarImovel = function(dadosImovel){
        
        $.ajax({
            method: "POST",
              url: $scope.url + "/editarImovel",
              data: {
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
              },
              headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              },
              success: function(response){
                  console.log('rolou');
              }
        });

        $scope.listarAnuncios();

    }

    $scope.dependenciasAnuncio();

  
});


$(".real").mask('###0.00', {
    reverse: true
  });

  $('#vd_ga, #pvm_ga').on('blur', calculateValue);

  function calculateValue() {
    var vd_ga = $('#vd_ga').val().replace(',', '.');
    var pvm_ga = $('#pvm_ga').val();
  
}


