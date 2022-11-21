@extends('layouts.header')

@section('titulo', 'dashboard')

@section('conteudo')

<div id="dashboard">
    <div class="container">
        
        <div class="col-12">
            <a class="btn btn-link menu-dashboard" href="{{route('enderecos.meuendereco')}}">Endereço</a>
            <a class="btn btn-link menu-dashboard" href="{{route('pagseguro.meupagseguro')}}">Cadastre seu pagseguro</a>
            <a class="btn btn-link menu-dashboard" href="{{route('produtos.pedido')}}">Meus Pedidos</a>
            <a class="btn btn-link menu-dashboard" href="{{route('produtos.itens_pedidos')}}">Pedidos a enviar</a>
        </div>

        <div class="col-12">
            <h2 class="meus-locais">Meus Produtos</h1>
        </div>
        @if(count($produtos)>0)

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Quantidade</th>
                    <th scope="col">R$</th>
                </tr>
            </thead>
            <tbody>
                @foreach($produtos as $produto)
                <tr class="table-light" scope="row">
                    <td class="bdr">{{$loop->index + 1}}</td>
                    <td><a class="text-black" href="/Produtos/{{$produto->id}}">{{$produto->nome}}</a></td>
                    <td>{{$produto->quantidade}}</td>
                    <td>{{number_format($produto->preco,2,',','.')}}</td>
                    <td class="alinhadoDireita">
                        <a href="/Produtos/edit/{{$produto->id}}" class="btn update"><i class="fa-solid fa-pen-to-square"></i></a>
                        <form action="/Produtos/{{$produto->id}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn"><i class="fa-solid fa-trash-can"></i></button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @else
        <p>vc ainda não tem produtos cadastrado. <a href="/Cadastrar_Produto/Adicionar_Novo_Produto">Cadastre um produto</a></p>
        @endif
        <div class="cadastrar-novo-local">
            <a href="/Cadastrar_Produto/Adicionar_Novo_Produto" class="btn">Cadatrar produto</a>
        </div>
        <div>
            @if(session('msg'))
            <p>{{ session('msg') }}</p>
            @endif
        </div>




    </div>


</div>




@endsection