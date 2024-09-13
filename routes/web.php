<?php

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

// Route::get('/', function () {
//     return view('inicio');
// });



Route::group(['prefix' => ''], function () {
	Route::resource('','InicioController');
    // Route::resource('noticias','NoticiaController');
    // Route::get('noticia/{id}', 'NoticiaController@show');
    Route::resource('comunicados','ComunicadoController');
    Route::get('comunicado/{id}', 'ComunicadoController@show');
    Route::resource('eventos','EventoController');
    Route::get('evento/{id}', 'EventoController@show');
    Route::get('unidades-de-saude/lista-de-unidades', 'UnidadeSaudeController@index_lista')->name('unidades-de-saude.lista-de-unidades');
    Route::get('unidades-de-saude/mapa-de-unidades', 'UnidadeSaudeController@index_mapa')->name('unidades-de-saude.mapa-de-unidades');
    Route::get('unidades-de-saude/search', 'UnidadeSaudeController@getAllUnidades')->name('unidades-de-saude.search');
    Route::resource('organograma','OrganogramaController');
	Route::get('sistemas','SistemaController@all'); 
    Route::get('sistemas/{id}','SistemaController@filter'); 
    Route::get('downloads','DownloadController@all'); 
    Route::get('downloads/{id}','DownloadController@filter'); 
        Route::get('acessibilidade','NavegacaoController@acessibilidade'); 
        Route::get('mapa-do-site','NavegacaoController@mapa_do_site');

});


Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::group(['prefix' => 'admin', 'middleware' => 'auth', 'as' => 'admin.'], function () {
    Route::resource('usuarios','admin\UsuarioAdminController');
    Route::resource('noticias','admin\NoticiaAdminController');
    Route::resource('comunicados','admin\ComunicadoAdminController');
    Route::resource('eventos','admin\EventoAdminController');
    Route::resource('unidades-de-saude','admin\UnidadesSaudeAdminController');
    Route::resource('categoria-unidades-de-saude','admin\TipoUnidadesSaudeAdminController');
    Route::resource('organograma','admin\OrganogramaAdminController');
    Route::resource('sistemas','admin\SistemaAdminController');
    Route::resource('downloads','admin\DownloadAdminController');
    Route::resource('categoria-downloads','admin\CategoriaDownloadAdminController');
    Route::resource('documentacao','admin\DocumentacaoAdminController');
});



// Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');


