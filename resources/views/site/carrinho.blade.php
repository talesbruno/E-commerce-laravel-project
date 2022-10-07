@extends('layouts.header')
@section('titulo', 'Triport')
@section('conteudo')

<div id="listar-locais">
    <div class="container">
        <div class="col-12">
            <h2 class="titulo-pontos-turisticos">Seu carrinho possui {{$itens->count()}} produtos.</h2>
        </div>
        <div class="row">
            <table class="table">
                <thead>
                  <tr>
                    <th scope="col"></th>
                    <th scope="col">Nome</th>
                    <th scope="col">Preço</th>
                    <th scope="col">Quantidade</th>
                    <th scope="col"></th>
                  </tr>
                </thead>
                <tbody>
                    @foreach($itens as $item)
                  <tr>
                    <th scope="row"><img src="{{$item->attributes->imagem}}" alt=""></th>
                    <td>{{$item->name}}</td>
                    <td>{{$item->price}}</td>
                    <td><input type="number" name="quantity" value="{{$item->quantity}}"></td>
                    <td><button>refresh</button>
                        <button>delete</button>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            <div class="row container center">
                <button>continuar comprando</button>
                <button>limpar carrinho</button>
                <button>finalizar pedido</button>
            </div>

        </div>

    </div>
    
</div>
@endsection