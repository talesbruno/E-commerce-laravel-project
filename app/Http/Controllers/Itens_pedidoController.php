<?php

namespace App\Http\Controllers;

use App\Models\Itens_pedido;
use Illuminate\Http\Request;
use App\Models\User;

class Itens_pedidoController extends Controller
{
    //construtor
    protected $user;
    protected $itens_pedidos;
    public function __construct(User $user, Itens_pedido $itens_pedidos){
        $this->user = $user;
        $this->itens_pedidos = $itens_pedidos;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Endereco  $endereco
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
       
        $itens_pedidos = Itens_pedido::paginate(6);
        
        return view('produtos.itens_pedidos',['itens_pedidos'=> $itens_pedidos]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pedido  $endereco
     * @return \Illuminate\Http\Response
     */
    public function edit(Itens_pedido $pedido)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pedido  $pedido
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Itens_pedido $pedido)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pedido  $pedido
     * @return \Illuminate\Http\Response
     */
    public function destroy(Itens_pedido $endereco)
    {
        //
    }
}
