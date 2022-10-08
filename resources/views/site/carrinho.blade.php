@extends('layouts.header')
@section('titulo', 'Triport')
@section('conteudo')

<div id="listar-locais">
    <div class="row container">
      
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
                <th scope="row"><img src="{{$item->attributes->imagem}}" alt=""></th>
                <td>{{$item->name}}</td>
                <td>R$: {{number_format($item->price,2,',','.')}}</td>
                <form action="{{route('site.atualizacarrinho')}}" method="POST" enctype="multipart/form-data">
                  @csrf
                  <input type="hidden" name="id" value="{{$item->id}}">
                <td><input type="number" name="quantity" min="1" value="{{$item->quantity}}"></td>
                <td><button>refresh</button>
                </form>
                  <form action="{{route('site.removecarrinho')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id" value="{{$item->id}}">
                    <button>delete</button>
                  </form>
                    
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
          <h5>Valor total:R$: {{number_format(\Cart::getTotal(),2,',','.')}}</h5>
      @endif
        
            <div class="row container center">
                <a href="{{route('locais.listar')}}">continuar comprando</a>
                <a href="{{route('site.limparcarrinho')}}">limpar carrinho</a>
                <button>finalizar pedido</button>
            </div>

        </div>

    </div>
    
</div>
@endsection