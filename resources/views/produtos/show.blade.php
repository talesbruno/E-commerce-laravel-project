@extends('layouts.header')


@section('titulo', $produto->nome)

@section('conteudo')

<div class="container-fluid">
    <div id="ponto-turistico-info">
        <div class="container">
            <div class="col-12">
                <h1 class="titulo-ponto-turistico">{{ $produto->nome}}</h1>
            </div>
            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-body">
                            <p class="card-text">{{ $produto->descricao }}</p>
                        </div>                      
                    </div>                   
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <img src="/img/imgprodutos/{{ $produto->imagem }}" class="card-img-top" alt="">
                        <div class="card-body">
                            <h5 class="card-title">Informaçoes do produto</h5>
                            <p class="card-text">R$: {{number_format($produto->preco,2,',','.')}}</p>
                            <p class="card-text">quantidade: {{ $produto->quantidade }} itens disponíveis</p>
                            <p class="card-text">Postado por: {{ $produto->user->name }}</p>
                            <form action="{{ route('carrinho.addcarrinho')}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="id" value="{{ $produto->id}}">
                                <input type="hidden" name="name" value="{{ $produto->nome }}">
                                <input type="hidden" name="price" value="{{ $produto->preco }}">
                                <input type="number" name="qnt" min="1" value="1">
                                <input type="hidden" name="img" value="{{ $produto->imagem }}">
                                <button class="btn">Comprar</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection