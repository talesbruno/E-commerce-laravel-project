@extends('layouts.header')

@section('titulo', 'Triport')

@section('conteudo')

<div id="listar-locais">
    <div class="container">
        <div class="col-12">
            <h2 class="titulo-pontos-turisticos">Produtos</h2>
        </div>
        <div class="row">

            @foreach($produtos as $produto)
            <div class="col-sm-3">
                <div class="card">
                    <img src="/img/imgprodutos/{{ $produto->imagem }}" class="card-img-top" alt="">
                    <div class="card-body">
                        <h5 class="card-title">{{ $produto->titulo}}</h5>
                        <p class="card-text">Endereço: {{ $produto->endereco }}</p>
                        <p class="card-text">Telefone: {{ $produto->telefone }}</p>
                        <a class="btn" href="/Pontos_Turisticos/{{ $produto->id }}">Ver mais</a>
                    </div>
                </div>
            </div>
            @endforeach

        </div>

    </div>
    <div class="row">
        {{$produtos->links('custom.pagination')}}
    </div>
</div>


@if(count($produtos)==0)
<p>Não há produtos disponíveis</p>
@endif

@endsection