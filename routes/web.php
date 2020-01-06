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

Route::get('/', function () {
    return view('welcome');
});

Route::get('tienda/','TiendaController@index')->middleware('authTienda');
Route::get('tienda/usuario/','TiendaController@getLoginUsuario');
Route::post('tienda/usuario/','TiendaController@postLoginUsuario');
Route::get('tienda/login/', 'TiendaController@getLogin');
Route::post('tienda/login/','TiendaController@postLogin');

Route::get('super','SuperController@index')->middleware('authSuper');
Route::get('super/productos','SuperController@showProductos')->middleware('authSuper');
Route::get('super/productos/nuevo','SuperController@getCreateProductos')->middleware('authSuper');
Route::post('super/productos/nuevo','SuperController@postCreateProductos')->middleware('authSuper');
Route::get('super/login/','SuperController@getLogin');
Route::post('super/login/','SuperController@postLogin');

