<?php

namespace App\Http\Controllers;

use App\Services\VendaService;
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

    public function finalizar(Request $request){
        $itens = \Cart::getContent();

        $vendaService = new VendaService();
        $result = $vendaService->finalizarVenda();

        $credCard = new \PagSeguro\Domains\Requests\DirectPayment\CreditCard();
        $credCard->setReference("PED_" . $result["idpeido"]);
        $credCard->setCurrency("BRL");

        foreach($itens as $item){
            $credCard->addItems()->withParameters(
                $item->id,
                $item->name,
                $item->qtd,
                number_format($item->price, 2, ".", "")
            );
        }
        $user = auth()->user();
        $credCard->setSender()->setName($user->name . " " . $user->name);
        $credCard->setSender()->setName($user->login. "@sandbox.pagseguro.com.br");
        $credCard->setSender()->setHash($request->input("hashseller"));
        $credCard->setSender()->setPhone()->withParameters(21, 21311255);
        $credCard->setSender()->setDocument()->withParameters("CPF", 12345678986);

        $credCard->setShipping()->setAddress()->withParameters(
            'Av. A',
            '1234',
            'jardim botanico',
            '39520000',
            'rio de janeiro',
            'MG',
            'BRA',
            'Apt. 200'
        );

        $credCard->setBilling()->setAddress()->withParameters(
            'Av. A',
            '1234',
            'jardim botanico',
            '39520000',
            'rio de janeiro',
            'MG',
            'BRA',
            'Apt. 200'
        );

        $credCard->setToken($request->input("cardtoken"));

        $nparcela = $request->input("nparcela");
        $totalapagar = $request->input("totalapagar");
        $totalparcela = $request->input("totalparcela");

        $credCard->setInstallment()->withParameters($nparcela, number_format($totalparcela, 2,".",""));

        $credCard->setHolder()->setName($user->name . " " . $user->name);
        $credCard->setHolder()->setDocument()->withParameters("CPF", 12442166686);
        $credCard->setHolder()->setBirthDate("01/01/1980");
        $credCard->setHolder()->setPhone()->withParameters(21, 123456789);

        $credCard->setMode("DEFAULT");
        $result = $credCard->register($this->getCredential());
       // return redirect()->route('carrinho.carrinho');
    }
}
