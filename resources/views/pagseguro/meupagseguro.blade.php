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
    <h2>Meu pagseguro</h2>
  </div>
  <div class="container">
    <div class="container">
      @foreach($pagseguros as $pagseguro)
        <div class="card green">
            <div class="card-body">
              <h5 class="card-title">Endereco: {{$pagseguro->rua}}</h5>     
              <p class="card-text">Numero:{{$pagseguro->numero}}</p>   
              <p class="card-text">bairro:{{$pagseguro->bairro}}</p>  
              <p class="card-text">cep:{{$pagseguro->cep}}</p>     
            </div>
          </div>
          @endforeach
          <a href="{{route('pagseguro.createpagseguro')}}">Cadastrar pagseguro</a>

    </div>

  </div>

</div>



@endsection