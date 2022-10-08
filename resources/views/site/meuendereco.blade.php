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

        <div class="card green">
            <div class="card-body">
              <h5 class="card-title">Endereco: </h5>     
              <p class="card-text"></p>      
            </div>
          </div>
          <a href="{{route('site.criarendereco')}}">Cadastrar endereço</a>

    </div>

  </div>

</div>



@endsection