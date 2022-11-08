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
    <h2>Meu endereço</h2>
  </div>
  <div class="container">
    <div class="container">
      @foreach($enderecos as $endereco)
        <div class="card green">
            <div class="card-body">
              <h5 class="card-title">Endereco: {{$endereco->rua}}</h5>     
              <p class="card-text">Numero: {{$endereco->numero}}</p>   
              <p class="card-text">Bairro: {{$endereco->bairro}}</p>  
              <p class="card-text">CEP: {{$endereco->cep}}</p>     
            </div>
          </div>
          @endforeach
          <a class="btn btn-primary" href="{{route('enderecos.editendereco',$endereco->id)}}">Alterar endereço</a>
          <a class="btn btn-success m-2" href="{{route('enderecos.createendereco')}}">Cadastrar endereço</a>
          
    </div>

  </div>

</div>



@endsection