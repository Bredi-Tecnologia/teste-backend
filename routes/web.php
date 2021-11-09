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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', [\App\Http\Controllers\ProdutosController::class, 'index']);
Route::get('/create', [\App\Http\Controllers\ProdutosController::class, 'create']);
Route::post('/save', [\App\Http\Controllers\ProdutosController::class, 'save']);
Route::get('/edit/{id}', [\App\Http\Controllers\ProdutosController::class, 'edit']);
Route::post('/update', [\App\Http\Controllers\ProdutosController::class, 'update']);
Route::get('/delete/{id}', [\App\Http\Controllers\ProdutosController::class, 'delete']);