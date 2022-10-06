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
use App\Http\Controllers\ProdutoController;

Route::get('/', [ProdutoController::class, 'index']);
Route::get('/Produtos/listar', [ProdutoController::class, 'listarTodosprodutos']);
Route::get('/Cadastrar_Produto/Adicionar_Novo_Produto', [ProdutoController::class, 'addNovoProduto'])->middleware('auth');
Route::get('/Produtos/{id}', [ProdutoController::class, 'show']);
Route::post('/Cadastrar_Novo_Local', [ProdutoController::class, 'store']);
Route::delete('/Produtos/{id}', [ProdutoController::class, 'destroy'])->middleware('auth');
Route::get('/Produtos/edit/{id}', [ProdutoController::class, 'edit'])->middleware('auth');
Route::put('/Produtos/update/{id}', [ProdutoController::class, 'update'])->middleware('auth');

Route::get('/dashboard', [ProdutoController::class, 'dashboard'])->middleware('auth');

Route::post('/Produtos/join/{id}', [ProdutoController::class, 'joinComment'])->middleware('auth');




