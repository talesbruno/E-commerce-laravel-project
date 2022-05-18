@extends('layouts.header')

@section('titulo', 'Triport')

@section('conteudo')


<h2>Pontos turisticos</h2>
<div>
    @foreach($pontosturisticos as $pontosturistico)
    <div><img src="/img/pontosturisticos/{{ $pontosturistico->imagem }}" alt="" width="50px" height="50px"></div>
    <div>
        <h5>{{ $pontosturistico->titulo}}</h5>
        <p>{{ $pontosturistico->descricao }}</p>
        <a href="/Pontos_Turisticos/{{ $pontosturistico->id }}">Ver mais</a>
    </div>

</div>
@endforeach
@if(count($pontosturisticos)==0)
<p>Não há locais disponíveis</p>
@endif

@endsection