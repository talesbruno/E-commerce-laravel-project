<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CarrinhoController extends Controller
{
    public function carrinhoLista(){
        $itens = \Cart::getContent();//getContent retorna o conteudo do carrinho
        return view('carrinho.carrinho', compact('itens'));
    }

    public function adicionaCarrinho(Request $request){
        \Cart::add([
            'id' => $request->id,
            'name' => $request->name,
            'price' => $request->price,
            'quantity' => abs($request->qnt),
            'attributes' => array(
                'image' => $request->img,
            )
        ]);
        return redirect()->route('carrinho.carrinho')->with('sucesso','Produto adicionado com sucesso!');
    }

    public function removecarrinho(Request $request){
        \Cart::remove($request->id);
        return redirect()->route('carrinho.carrinho')->with('sucesso','Produto removido com sucesso!');
    }

    public function atualizaCarrinho(Request $request){
        \Cart::update($request->id, [
            'quantity'=>[
                'relative'=> false,
                'value' =>abs($request->quantity) 
            ]
        ]);
        return redirect()->route('carrinho.carrinho')->with('sucesso','Produto atualizado com sucesso!');
    }
    public function limparCarrinho(){
        \Cart::clear();
        return redirect()->route('carrinho.carrinho')->with('aviso','Carrinho vazio!.');
    }
}
