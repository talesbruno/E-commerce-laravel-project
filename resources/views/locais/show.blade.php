@extends('layouts.header')

@section('titulo', $pontosturistico->titulo)

@section('conteudo')

<div>
    <div>
    <img src="/img/pontosturisticos/{{ $pontosturistico->imagem }}" alt="" width="50px" height="50px">
    </div>
    <div>
        <h5>{{ $pontosturistico->titulo}}</h5>
        <p>{{ $pontosturistico->descricao }}</p>
    </div>

    
</div>

@endsection