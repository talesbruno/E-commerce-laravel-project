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
                        <h5 class="card-title">{{ $produto->nome}}</h5>
                        <p class="card-text">R$: {{number_format($produto->preco,2,',','.')}}</p>
                        <p class="card-text">quantidade: {{ $produto->quantidade }} itens disponíveis</p>
                        <a class="btn" href="/Produtos/{{ $produto->id }}">Ver mais</a>
                    </div>
                </div>
            </div>
            @endforeach

        </div>
        <div class="py-4">
            {{$produtos->appends([
                'search' => request()->get('search', '')
            ])->links()}}
        </div>

    </div>
    
</div>


@if(count($produtos)==0)
<p>Não há produtos disponíveis</p>
@endif

@endsection