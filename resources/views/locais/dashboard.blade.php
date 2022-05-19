@extends('layouts.header')

@section('titulo', 'dashboard')

@section('conteudo')

<div>
    <h1>Meus Locais</h1>
</div>
<div>
    @if(count($pontosturisticos)>0)
    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>Nome</th>
                <th>Ações</th>
            </tr>
        </thead>
    <tbody>
        @foreach($pontosturisticos as $pontosturistico)
        <tr>
            <td>{{$loop->index + 1}}</td>
            <td><a href="/Pontos_Turisticos/{{$pontosturistico->id}}">{{$pontosturistico->titulo}}</a></td>
            <td>
                <a href="/Pontos_Turisticos/edit/{{$pontosturistico->id}}">Editar</a> 
                <form action="/Pontos_Turisticos/{{$pontosturistico->id}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Deletar</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
    </table>
    @else
    <p>vc ainda tem tem locais cadastrado. <a href="/Cadastrar_Pontos_Turisticos/Adicionar_Novo_Local">Cadastre um local</a></p>
    @endif
</div>

@endsection