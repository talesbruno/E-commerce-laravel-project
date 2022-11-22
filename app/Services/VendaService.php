<?php

namespace App\Services;
use Log;
use App\Models\User;
use App\Models\Pedido;
use App\Models\Itens_pedido;

class VendaService {
    public function finalizarVenda(){

        $itens = \Cart::getContent();// itens do carrinho
        $user = auth()->user();//user que está logado
        $pedido = new Pedido();
        $pedido->status ="Pendente";
        $pedido->user_id = $user->id;
        $pedido->save();

        foreach($itens as $item){
            $itensPedio = new Itens_pedido();

            $itensPedio->quantidade = $item->quantity;
            $itensPedio->preco = $item->price * $item->quantity;
            $itensPedio->produto_id = $item->id;
            $itensPedio->pedido_id = $pedido->id;
            $itensPedio->save();
        }
        return ['idpedido'=>$pedido->id];
        //$user->enderecos()->create($request->all()); // forma mais produtiva de cadastrar
    }
}