<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pontosturistico;
use App\Models\User;

class GuiaController extends Controller
{
    public function index(){
        $pesquisa = request('pesquisa');

        if($pesquisa){

            $pontosturisticos = Pontosturistico::where([
                ['titulo','like', '%'.$pesquisa.'%']
            ])->get();

        } else{
            $pontosturisticos = Pontosturistico::all();
        }
        return view('welcome',['pontosturisticos'=>$pontosturisticos,'pesquisa' => $pesquisa]);
    }

    public function listarTodosPontosTuristicos(){

        $pontosturisticos = Pontosturistico::all();
        
        return view('locais.listar',['pontosturisticos'=> $pontosturisticos]);
    }

    public function addNovoLocal(){
        return view('locais.criarlocal');
    }

    public function store(Request $request){

        $pontosturistico = new Pontosturistico;

        $pontosturistico->titulo = $request->titulo;
        $pontosturistico->descricao = $request->descricao;

        //upload imagem
        if($request->hasFile('imagem') &&  $request->file('imagem')->isValid()){

            $requestImagem = $request->imagem;

            $extension = $requestImagem->extension();

            $imagemNome = md5($requestImagem->getClientOriginalName().strtotime("now")).".".$extension;

            $requestImagem->move(public_path('img/pontosturisticos'), $imagemNome);

            $pontosturistico->imagem = $imagemNome;


        }
        $user = auth()->user();
        $pontosturistico->user_id = $user->id;
        
        $pontosturistico->save();

        return redirect('/')->with('msg', 'Local cadastrado com sucesso!');
    }

    public function show($id){
        $pontosturistico = Pontosturistico::findOrFail($id);

        $donoDoLocal = User::where('id', $pontosturistico->user_id)->first()->toArray();

        return view('locais.show', ['pontosturistico' => $pontosturistico, 'donoDoLocal' => $donoDoLocal]);
    }

    public function dashboard(){

        $user = auth()->user();

        $pontosturisticos = $user->pontosturisticos;

        return view('locais.dashboard', ['pontosturisticos' => $pontosturisticos]);
    }

    public function destroy($id){

        Pontosturistico::findOrFail($id)->delete();

        return redirect('/dashboard')->with('msg', 'Local excluido com sucesso!');

    }

    public function edit($id){

       $pontosturistico = Pontosturistico::findOrFail($id);
        
        return view('locais.edit',['pontosturistico'=> $pontosturistico]);

    }

    public function update(Request $request){

        $data = $request->all();

        //upload imagem
        if($request->hasFile('imagem') &&  $request->file('imagem')->isValid()){

            $requestImagem = $request->imagem;

            $extension = $requestImagem->extension();

            $imagemNome = md5($requestImagem->getClientOriginalName().strtotime("now")).".".$extension;

            $requestImagem->move(public_path('img/pontosturisticos'), $imagemNome);

            $data['imagem']= $imagemNome;


        }


        Pontosturistico::findOrFail($request->id)->update($data);
         
        return redirect('/dashboard')->with('msg', 'Local editado com sucesso!');
 
     }
}
