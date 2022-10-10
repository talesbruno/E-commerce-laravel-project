<?php

namespace App\Http\Controllers;

use App\Models\Endereco;
use Illuminate\Http\Request;
use App\Models\User;

class EnderecoController extends Controller
{
    //construtor
    protected $user;
    protected $enderecos;
    public function __construct(User $user, Endereco $enderecos){
        $this->user = $user;
        $this->enderecos = $enderecos;
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
        return view('enderecos.createendereco');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $enderecos = new Endereco;

        $enderecos->rua = $request->rua;
        $enderecos->numero = $request->numero;
        $enderecos->bairro = $request->bairro;
        $enderecos->cep = $request->cep;

        $user = auth()->user();
        $enderecos->user_id = $user->id;
        
        //$user->enderecos()->create($request->all()); // forma mais produtiva de cadastrar
        
        $enderecos->save();

        return redirect()->route('enderecos.meuendereco');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Endereco  $endereco
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $user = auth()->user();

        $enderecos = $user->enderecos;

        return view('enderecos.meuendereco', ['enderecos' => $enderecos]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Endereco  $endereco
     * @return \Illuminate\Http\Response
     */
    public function edit(Endereco $endereco)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Endereco  $endereco
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Endereco $endereco)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Endereco  $endereco
     * @return \Illuminate\Http\Response
     */
    public function destroy(Endereco $endereco)
    {
        //
    }
}
