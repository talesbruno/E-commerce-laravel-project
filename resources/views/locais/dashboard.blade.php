@extends('layouts.header')

@section('titulo', 'dashboard')

@section('conteudo')

<div id="dashboard">
    <div class="container">
        <div class="col-12">
            <h2 class="meus-locais">Meus locais</h1>
        </div>
        @if(count($pontosturisticos)>0)

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Comentarios</th>
                </tr>
            </thead>
            <tbody>
                @foreach($pontosturisticos as $pontosturistico)
                <tr class="table-light" scope="row">
                    <td class="bdr">{{$loop->index + 1}}</td>
                    <td><a class="text-white" href="/Pontos_Turisticos/{{$pontosturistico->id}}">{{$pontosturistico->titulo}}</a></td>
                    <td>{{ count($pontosturistico->users)}}</td>
                    <td class="alinhadoDireita">
                        <a href="/Pontos_Turisticos/edit/{{$pontosturistico->id}}" class="btn"><i class="fa-solid fa-pen-to-square"></i></a>
                        <form action="/Pontos_Turisticos/{{$pontosturistico->id}}" method="POST">
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
        <p>vc ainda tem tem locais cadastrado. <a href="/Cadastrar_Produto/Adicionar_Novo_Produto">Cadastre um local</a></p>
        @endif
        <div class="cadastrar-novo-local">
            <a href="/Cadastrar_Produto/Adicionar_Novo_Produto" class="btn">Cadatrar local</a>
        </div>
        <div>
            @if(session('msg'))
            <p>{{ session('msg') }}</p>
            @endif
        </div>




    </div>


</div>




@endsection