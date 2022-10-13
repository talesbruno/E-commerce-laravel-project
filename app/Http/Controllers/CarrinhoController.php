<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PagSeguro\Configuration\Configure;

class CarrinhoController extends Controller
{
    private $_configs;

    public function __construct()
    {
        $this->_configs = new Configure();
        $this->_configs->setCharset("UTF-8");
        $this->_configs->setAccountCredentials(env('PAGSEGURO_EMAIL'), env('PAGSEGURO_TOKEN'));
        $this->_configs->setEnvironment(env("PAGSEGURO_AMBIENTE"));
        $this->_configs->setLog(true, storage_path('logs/pagseguro_' . date('Ymd') . '.log'));
    }

    public function getCredential(){
        return $this->_configs->getAccountCredentials();
    }

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

    public function finalizarPedido(){
        $itens = \Cart::getContent();

        $sessionCode = \PagSeguro\Services\Session::create(
            $this->getCredential()
        );
        $sessionID = $sessionCode->getResult();


        return view('carrinho.pagar', compact('sessionID', 'itens'));
    }
}
