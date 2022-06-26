@extends('layouts.header')

@section('titulo', 'Triport')

@section('conteudo')

<div id="listar-locais">
    <div class="container">
        <div class="col-12">
            <h2 class="titulo-pontos-turisticos">Pontos turisticos</h2>
        </div>
        <div class="row">

            @foreach($pontosturisticos as $pontosturistico)
            <div class="col-sm-3">
                <div class="card">
                    <img src="/img/pontosturisticos/{{ $pontosturistico->imagem }}" class="card-img-top" alt="">
                    <div class="card-body">
                        <h5 class="card-title">{{ $pontosturistico->titulo}}</h5>
                        <p class="card-text">Endereço: {{ $pontosturistico->endereco }}</p>
                        <p class="card-text">Telefone: {{ $pontosturistico->telefone }}</p>
                        <a class="btn" href="/Pontos_Turisticos/{{ $pontosturistico->id }}">Ver mais</a>
                    </div>
                </div>
            </div>
            @endforeach

        </div>

    </div>
</div>


@if(count($pontosturisticos)==0)
<p>Não há locais disponíveis</p>
@endif

@endsection