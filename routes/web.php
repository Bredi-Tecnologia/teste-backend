<?php

use App\Categorias;
use App\Http\Controllers\IndexController;
use App\Produto;
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

Route::get('/', [IndexController::class, 'listarAction']);
Route::post('/', [IndexController::class, 'criarAction']);
Route::delete('/', [IndexController::class, 'deleteAction']);
Route::get('/criar', function(){
    $categorias = Categorias::all();
    return view('editar', compact('categorias'));
});

Route::get('/editar/{id}', function ($id){
$dados = Produto::find($id);
$categorias = Categorias::all();
    return view('editar', compact('categorias'))->with('dado', $dados);
});