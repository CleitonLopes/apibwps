<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix' => 'parametro-empresa'], function()
{
    Route::get('', ['uses' => 'ParametroEmpresaController@find']);
    Route::post('', ['uses' => 'ParametroEmpresaController@create']);

});

Route::group(['prefix' => 'empresa-configuracao'], function()
{
	Route::post('', ['uses' => 'EmpresaConfiguracaoController@create']);
});

Route::group(['prefix' => 'estrutura'], function()
{
    Route::post('', ['uses' => 'EstruturaController@create']);
});

