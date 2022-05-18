@extends('layouts.main')

@section('titulo', 'Triport')

@section('conteudo')

<div>
    @if($pesquisa)
    <h2>Buscando por:{{$pesquisa}}</h2>
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
@endif
</div>
@if(count($pontosturisticos)==0 && $pesquisa)
<p>Não foi possível encontrar nenhum local com {{$pesquisa}}! <a href="/Pontos_Turisticos/listar">Ver Todos</a></p>
@endif



@endsection