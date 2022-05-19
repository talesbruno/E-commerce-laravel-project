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
            <td><a href="#">Editar</a> <a href="#">Deletar</a></td>
        </tr>
        @endforeach
    </tbody>
    </table>
    @else
    <p>vc ainda tem tem locais cadastrado. <a href="/locais/criarlocal"></a></p>
    @endif
</div>

@endsection