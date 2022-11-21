@extends('layouts.header')

@section('nome', 'Cadastrar endereço')

@section('conteudo')

@if($errors->any())
<ul>
  @foreach($errors->all() as $error)
  <li>{{$error}}</li>
  @endforeach
</ul>
@endif

<div id="cadastrar-local">
  <div class="col-12">
    <h2>Pedidos</h2>
  </div>
  <div class="container">
    <div class="container">
      @foreach($itens_pedidos as $iten)
        <div class="card green">
            <div class="card-body">
              <h5 class="card-title">ID: {{$iten->id}}</h5>     
              <p class="card-text">Quantidade: {{$iten->quantidade}}</p>   
              <p class="card-text">Preço: {{$iten->preco}}</p>  
              <p class="card-text">Produto: {{$iten->produto->nome}}</p>  
              <p class="card-text">Status: {{$iten->pedido->status}}</p>  
              <p class="card-text">Usuario: {{$iten->pedido->user_id}}</p> 
              <p class="card-text">Data: {{$iten->pedido->created_at}}</p> 
              <a href="#">Alterar status</a>    
            </div>
          </div>
          @endforeach
    </div>

  </div>

</div>



@endsection