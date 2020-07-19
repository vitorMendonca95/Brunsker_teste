<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('adminlte::auth.login');
});

Auth::routes();

Route::get('/cadastrarImovel', function () {
    return view('cadastrar-imoveis');
});

Route::get('/pesquisarImovel', function (){
    return view('pesquisar-imoveis');
});

Route::get('cadastrarImovel/dependenciasAnuncio', 'LocacaoImoveisController@listardependenciasAnuncio')->name('dependenciasAnuncio');
Route::post('cadastrarImovel/salvarAnuncio', 'LocacaoImoveisController@salvarAnuncio')->name('salvarAnuncio');
Route::get('pesquisarImovel/listarAnuncios', 'LocacaoImoveisController@listarAnuncios');
Route::get('pesquisarImovel/detalharAnuncios/{id}', 'LocacaoImoveisController@detalharAnuncios');
Route::get('pesquisarImovel/dependenciasAnuncio', 'LocacaoImoveisController@listardependenciasAnuncio')->name('dependenciasAnuncio');
Route::post('pesquisarImovel/editarImovel', 'LocacaoImoveisController@editarImovel');
Route::post('pesquisarImovel/deletarImovel/{id}', 'LocacaoImoveisController@deletarImovel'); 


Route::get('/home', 'HomeController@index')->name('home');


