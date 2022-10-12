<?php

namespace App\Http\Controllers;

use App\Models\Pagseguro;
use Illuminate\Http\Request;
use App\Models\User;

class PagseguroController extends Controller
{
    //construtor
    protected $user;
    protected $pagseguros;
    public function __construct(User $user, Pagseguro $pagseguros){
        $this->user = $user;
        $this->pagseguros = $pagseguros;
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
        return view('pagseguro.createpagseguros');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = auth()->user();     
        $user->pagseguros()->create($request->all()); // forma mais produtiva de cadastrar
        
        return redirect()->route('pagseguro.meupagseguro');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pagseguro  $pagseguro
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $user = auth()->user();

        $pagseguros = $user->pagseguros;

        return view('pagseguro.meupagseguro', ['pagseguros' => $pagseguros]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pagseguro  $pagseguro
     * @return \Illuminate\Http\Response
     */
    public function edit(pagseguro $pagseguro)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pagseguro  $pagseguro
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pagseguro $pagseguro)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pagseguro  $pagseguro
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pagseguro $pagseguro)
    {
        //
    }
}
