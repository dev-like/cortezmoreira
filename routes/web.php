<?php

Route::get('/', 'WebSiteController@home')->name('home');
Route::get('quemsomos', 'WebSiteController@quemsomos')->name('quemsomos');
Route::get('corpoclinico', 'WebSiteController@corpoclinico')->name('corpoclinico');
Route::get('convenios', 'WebSiteController@convenios')->name('convenios');
Route::post('cadastro_agendamento', 'WebSiteController@cadastroAgendamento')->name('cadastro.agendamento');
Route::post('cadastro_coleta', 'WebSiteController@cadastroColeta')->name('cadastro.coleta');
Route::get('resultados', 'WebSiteController@resultados')->name('resultados');
Route::get('agendamento', 'WebSiteController@agendamento')->name('agendamento');

Route::get('pagenotfound', ['as' => 'notfound','uses' => 'WebSiteController@pagenotfound']);

route::get('mail', 'mailController@index');
route::post('postMail', 'mailController@post');

route::get('mail2', 'mailControlle2r@index');
route::post('postMail2', 'mailController2@post');

Route::get('csrf', function () {
    return Session::token();
});

Route::group(['prefix' => 'admin', 'middleware' => 'auth:web'], function () {

    Route::get('/', 'HomeController@index')->name('admin.home');
    Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');

    Route::resource('empresa', 'EmpresaController');
    Route::resource('unidades', 'UnidadeController');
    Route::resource('premios', 'PremioController');

    Route::get('agendamentos', 'EventController@index')->name('agendamentos');
    Route::get('coleta', 'ColetaController@index')->name('coletas');

    Route::post('infopremio','PremioController@infostore')->name('storepremio');
    Route::put('infopremio/edit{id}','PremioController@infoupdate')->name('updatepremio');

    Route::post('infoclinicos','CorpoClinicoController@infostore')->name('storeclinico');
    Route::put('infoclinicos/edit{id}','CorpoClinicoController@infoupdate')->name('updateclinico');

    Route::post('infoconvenios','ConvenioController@infostore')->name('storeconvenio');
    Route::put('infoconvenios/edit{id}','ConvenioController@infoupdate')->name('updateconvenio');

    Route::resource('infosite', 'InfoSiteController');
    Route::resource('convenios', 'ConvenioController');
    Route::resource('parceiros', 'ParceiroController');
    Route::resource('corpoclinico', 'CorpoClinicoController');
    Route::resource('quemsomos', 'QuemSomosController');
    Route::resource('historico', 'HistoricoController');
    Route::resource('banners', 'BannerController');
    Route::post('banners/order', 'BannerController@BannerOrdem');

    Route::resource('usuario', 'UserController');
    Route::get('usuario/{usuario}/editar_senha', 'UserController@editPassword')->name('usuario.editar_senha');
    Route::post('usuario/atualizar_senha/{usuario}', 'UserController@updatePassword')->name('usuario.atualizar_senha');
});

Auth::routes();
