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

      <form action="{{route('enderecos.addendereco')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
          <div class="col-md-8">
            <div class="container">
              <div class="form-group">
                <label for="rua">rua:</label>
                <input type="text" class="form-control" id="rua" name="rua" >
              </div>
              <div class="form-group">
                <label for="numero">numero:</label>
                <input type="text" class="form-control" id="numero" name="numero" >
              </div>
              <div class="form-group">
                <label for="bairro">bairro:</label>
                <input type="text" class="form-control" id="bairro" name="bairro" >
              </div>
              <div class="form-group">
                <label for="cep">cep:</label>
                <input type="text" class="form-control" id="cep" name="cep" >
              </div>
              <div class="form-group">
                <input class="btn" type="submit" value="Cadastrar">
              </div>

            </div>
          </div>
        </div>
      </form>

    </div>

  </div>

</div>



@endsection