<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\CarrinhoController;

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

Route::get('/carrinho', [CarrinhoController::class, 'carrinhoLista'])->middleware('auth');


