<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\CarrinhoController;
use App\Http\Controllers\EnderecoController;
use App\Http\Controllers\PagseguroController;

Route::get('/', [ProdutoController::class, 'index']);
Route::get('/Produtos/listar', [ProdutoController::class, 'listarTodosprodutos'])->name('produtos.listar');
Route::get('/Cadastrar_Produto/Adicionar_Novo_Produto', [ProdutoController::class, 'addNovoProduto'])->middleware('auth');
Route::get('/Produtos/{id}', [ProdutoController::class, 'show']);
Route::post('/Cadastrar_Novo_Local', [ProdutoController::class, 'store']);
Route::delete('/Produtos/{id}', [ProdutoController::class, 'destroy'])->middleware('auth');
Route::get('/Produtos/edit/{id}', [ProdutoController::class, 'edit'])->middleware('auth');
Route::put('/Produtos/update/{id}', [ProdutoController::class, 'update'])->middleware('auth');

Route::get('/dashboard', [ProdutoController::class, 'dashboard'])->middleware('auth');

Route::post('/Produtos/join/{id}', [ProdutoController::class, 'joinComment'])->middleware('auth');

Route::get('/Carrinho', [CarrinhoController::class, 'carrinhoLista'])->name('carrinho.carrinho')->middleware('auth');
Route::post('/Carrinho', [CarrinhoController::class, 'adicionaCarrinho'])->name('carrinho.addcarrinho')->middleware('auth');
Route::post('/Carrinho/remover', [CarrinhoController::class, 'removeCarrinho'])->name('carrinho.removecarrinho')->middleware('auth');
Route::post('/Carrinho/atualizar', [CarrinhoController::class, 'atualizaCarrinho'])->name('carrinho.atualizacarrinho')->middleware('auth');
Route::get('/Carrinho/limpar', [CarrinhoController::class, 'limparCarrinho'])->name('carrinho.limparcarrinho')->middleware('auth');
Route::get('/Carrinho/Pagar', [CarrinhoController::class, 'finalizarPedido'])->name('carrinho.finalizarPedido')->middleware('auth');
Route::post('/Carrinho/Pagar', [CarrinhoController::class, 'finalizar'])->name('carrinho.finalizar')->middleware('auth');

Route::get('/Endereco', [EnderecoController::class, 'show'])->name('enderecos.meuendereco')->middleware('auth');
Route::get('/Endereco/Cadastrar', [EnderecoController::class, 'create'])->name('enderecos.createendereco')->middleware('auth');
Route::post('/Endereco/Salvar', [EnderecoController::class, 'store'])->name('enderecos.addendereco')->middleware('auth');

Route::get('/Pagseguro', [PagseguroController::class, 'show'])->name('pagseguro.meupagseguro')->middleware('auth');
Route::get('/Pagseguro/Cadastrar', [PagseguroController::class, 'create'])->name('pagseguro.createpagseguro')->middleware('auth');
Route::post('/Pagseguro/Salvar', [PagseguroController::class, 'store'])->name('pagseguro.addpagseguro')->middleware('auth');


