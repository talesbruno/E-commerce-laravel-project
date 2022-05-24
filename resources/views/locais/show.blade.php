@extends('layouts.header')

@section('titulo', $pontosturistico->titulo)

@section('conteudo')

<div>
    <div>
        <img src="/img/pontosturisticos/{{ $pontosturistico->imagem }}" alt="" width="50px" height="50px">
    </div>
    <div>
        <h5>{{ $pontosturistico->titulo}}</h5>
        <p>Criado por: {{ $donoDoLocal['name']}}</p>
        <p>{{ $pontosturistico->descricao }}</p>
    </div>
</div>

<div>
    <h3>Comentarios:</h3>
    @foreach($pontosturistico->users as $user)

    <div>
        <h5>{{$user->pivot->comentario}}</h5><br>
    </div>
    @endforeach
</div>


<div>
    <form action="/Pontos_Turisticos/join/{{$pontosturistico->id}}" method="POST">
        @csrf
        <h1>Deixe um comentario sobre o local</h1>
        <textarea type="text" name="comentario" id="comentario"></textarea>
        <input type="submit">
    </form>
</div>




@endsection