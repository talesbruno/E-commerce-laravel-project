@extends('layouts.header')
@section('titulo', 'Triport')
@section('conteudo')

<div id="listar-locais">
    <div class="row container ">
      
      @if ($mensagem = Session::get('sucesso'))    
      <div class="card green">
        <div class="card-body">
          <h5 class="card-title">Parabéns!</h5>     
          <p class="card-text">{{$mensagem}}</p>      
        </div>
      </div>
      @endif

      @if ($mensagem = Session::get('aviso'))    
      <div class="card green">
        <div class="card-body">
          <h5 class="card-title">Tudo bem!</h5>     
          <p class="card-text">{{$mensagem}}</p>      
        </div>
      </div>
      @endif
      @if($itens->count() == 0)
      <div class="card green">
        <div class="card-body">
          <h5 class="card-title">Seu carrinho está vazio!</h5>     
          <p class="card-text">aproveite nossas promoções!</p>      
        </div>
      </div>

      @else
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
                <td><img src="{{asset('img/imgprodutos').'/'.$item->attributes->image}}" width="70" alt=""></td>
                <td>{{$item->name}}</td>
                <td>R$: {{number_format($item->price,2,',','.')}}</td>
                <form action="{{route('carrinho.atualizacarrinho')}}" method="POST" enctype="multipart/form-data">
                  @csrf
                  <input type="hidden" name="id" value="{{$item->id}}">
                <td><input type="number" name="quantity" min="1" value="{{$item->quantity}}"></td>
                <td><button class="btn btn-warning"><i class="fa fa-refresh" aria-hidden="true"></i></button>
                </form>
                  <form action="{{route('carrinho.removecarrinho')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id" value="{{$item->id}}">
                    <button class="btn btn-danger"><i class="fa fa-times" aria-hidden="true"></i></button>
                  </form>
                    
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
          <h5>Valor total:R$: {{number_format(\Cart::getTotal(),2,',','.')}}</h5>
      @endif
        
            <div class="container center">
                <a class="btn btn-primary" href="{{route('produtos.listar')}}">continuar comprando <i class="fa-solid fa-arrow-left"></i></a>
                <a class="btn btn-danger" href="{{route('carrinho.limparcarrinho')}}">limpar carrinho <i class="fa-solid fa-xmark"></i></a>
                <button class="btn btn-success">finalizar pedido <i class="fa-solid fa-check"></i></button>
            </div>

        </div>

    </div>
    
</div>
@endsection