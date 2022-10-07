<?php

namespace App\Http\Controllers;

use App\Http\Requests\JoinCommentFormRequest;
use App\Http\Requests\StoreCommentFormRequest;
use Illuminate\Http\Request;
use App\Models\Produto;
use App\Models\User;

class ProdutoController extends Controller
{
    public function index(){
        $pesquisa = request('pesquisa');

        if($pesquisa){

            $produtos = Produto::where([
                ['nome','like', '%'.$pesquisa.'%']
            ])->get();

        } else{
            $produtos = Produto::all();
        }
        return view('welcome',['produtos'=>$produtos,'pesquisa' => $pesquisa]);
    }

    public function listarTodosprodutos(){

        $produtos = Produto::paginate(6);
        
        return view('locais.listar',['produtos'=> $produtos]);
       //compact() outra forma de passar variavel para a view
    }

    public function addNovoProduto(){
        return view('locais.criarlocal');
    }

    public function store(StoreCommentFormRequest $request){

        $produto = new Produto;

        $produto->nome = $request->nome;
        $produto->preco = $request->preco;
        $produto->quantidade = $request->quantidade;
        $produto->descricao = $request->descricao;

        //upload imagem
        if($request->hasFile('imagem') &&  $request->file('imagem')->isValid()){

            $requestImagem = $request->imagem;

            $extension = $requestImagem->extension();

            $imagemNome = md5($requestImagem->getClientOriginalName().strtotime("now")).".".$extension;

            $requestImagem->move(public_path('img/imgprodutos'), $imagemNome);

            $produto->imagem = $imagemNome;


        }
        $user = auth()->user();
        $produto->user_id = $user->id;
        
        $produto->save();

        return redirect('/dashboard')->with('msg', 'Local cadastrado com sucesso!');
    }

    public function show($id){
        $produto = Produto::findOrFail($id);

        $users = User::all();

        $donoDoLocal = User::where('id', $produto->user_id)->first()->toArray();

        return view('locais.show', ['produto' => $produto, 'donoDoLocal' => $donoDoLocal, 'users' => $users]);
    }

    public function dashboard(){

        $user = auth()->user();

        $produtos = $user->produtos;

        return view('locais.dashboard', ['produtos' => $produtos]);
    }

    public function destroy($id){

        $user = auth()->user();
        
        $user->produtosAsComment()->detach($id);

        Produto::findOrFail($id)->delete();

        return redirect('/dashboard')->with('msg', 'Local excluido com sucesso!');

    }

    public function edit($id){

       $produto = Produto::findOrFail($id);
        
        return view('locais.edit',['produto'=> $produto]);

    }

    public function update(Request $request){

        $data = $request->all();

        //upload imagem
        if($request->hasFile('imagem') &&  $request->file('imagem')->isValid()){

            $requestImagem = $request->imagem;

            $extension = $requestImagem->extension();

            $imagemNome = md5($requestImagem->getClientOriginalName().strtotime("now")).".".$extension;

            $requestImagem->move(public_path('img/produtos'), $imagemNome);

            $data['imagem']= $imagemNome;


        }


        Produto::findOrFail($request->id)->update($data);
         
        return redirect('/dashboard')->with('msg', 'Local editado com sucesso!');
 
     }

     public function joinComment(JoinCommentFormRequest $request, $id){

        $user = auth()->user();

        $user->produtosAsComment()->attach($id,['comentario'=> $request->comentario, 'estrela'=> $request->estrela , 'nome'=> $request->nome]);

        $produto = Produto::findOrFail($request->id);

        return redirect('/Produtos/listar')->with('msg', 'Obrigado por deixar sua avaliação sobre o local ' . $produto->nome);
     }

     
     
}
