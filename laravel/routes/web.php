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
//Pagina Inicial
Route::get('/', 'HomeController@index')->name('home');

//Novo Produto
Route::post('/novoproduto', 'HomeController@novoProduto')->name('novoproduto');

//Editar Produto
Route::put('/editarproduto', 'HomeController@editarproduto')->name('editarproduto');

//Deletar Produto
Route::delete('/editarproduto', 'HomeController@deletaProduto')->name('deletaproduto');
