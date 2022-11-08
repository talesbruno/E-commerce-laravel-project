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
      @foreach($pedidos as $pedido)
        <div class="card green">
            <div class="card-body">
              <h5 class="card-title">ID: {{$pedido->id}}</h5>     
              <p class="card-text">Status:{{$pedido->status}}</p>       
            </div>
          </div>
          @endforeach
    </div>

  </div>

</div>



@endsection