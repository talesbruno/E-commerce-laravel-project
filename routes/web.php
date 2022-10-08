<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\CarrinhoController;
use App\Http\Controllers\EnderecoController;

Route::get('/', [ProdutoController::class, 'index']);
Route::get('/Produtos/listar', [ProdutoController::class, 'listarTodosprodutos'])->name('locais.listar');
Route::get('/Cadastrar_Produto/Adicionar_Novo_Produto', [ProdutoController::class, 'addNovoProduto'])->middleware('auth');
Route::get('/Produtos/{id}', [ProdutoController::class, 'show']);
Route::post('/Cadastrar_Novo_Local', [ProdutoController::class, 'store']);
Route::delete('/Produtos/{id}', [ProdutoController::class, 'destroy'])->middleware('auth');
Route::get('/Produtos/edit/{id}', [ProdutoController::class, 'edit'])->middleware('auth');
Route::put('/Produtos/update/{id}', [ProdutoController::class, 'update'])->middleware('auth');

Route::get('/dashboard', [ProdutoController::class, 'dashboard'])->middleware('auth');

Route::post('/Produtos/join/{id}', [ProdutoController::class, 'joinComment'])->middleware('auth');

Route::get('/carrinho', [CarrinhoController::class, 'carrinhoLista'])->name('site.carrinho');
Route::post('/carrinho', [CarrinhoController::class, 'adicionaCarrinho'])->name('site.addcarrinho');
Route::post('/remover', [CarrinhoController::class, 'removeCarrinho'])->name('site.removecarrinho');
Route::post('/atualizar', [CarrinhoController::class, 'atualizaCarrinho'])->name('site.atualizacarrinho');
Route::get('/limpar', [CarrinhoController::class, 'limparCarrinho'])->name('site.limparcarrinho');

Route::get('/Endereco', [EnderecoController::class, 'show'])->name('site.meuendereco')->middleware('auth');
Route::get('/Cadastrar/Endereco', [EnderecoController::class, 'create'])->name('site.criarendereco')->middleware('auth');
Route::post('/Cadastrar/Salvar', [EnderecoController::class, 'store'])->name('site.addendereco')->middleware('auth');



