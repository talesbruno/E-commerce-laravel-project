@extends('layouts.header')

@section('titulo', 'Cadastrar Local')

@section('conteudo')

@if($errors->any())
<ul>
  @foreach($errors->all() as $error)
  <li>{{$error}}</li>
  @endforeach
</ul>
@endif

<div id="cadastar-local">
  <div class="col-12">
    <h2>Cadastrar local</h2>
  </div>
  <div class="container">
    <form action="/Cadastrar_Novo_Local" method="POST" enctype="multipart/form-data">
      @csrf

      <div class="row">

        <div class="col-md-8">
          <div class="container">

            <div class="form-group">
              <label for="titulo">Titulo:</label>
              <input type="text" class="form-control" id="titulo" name="titulo">
            </div>
            <div class="form-group">
              <label for="endereco">Endereço:</label>
              <input type="text" class="form-control" id="endereco" name="endereco">
            </div>
            <div class="form-group">
              <label for="telefone">Telefone:</label>
              <input type="text" class="form-control" id="telefone" name="telefone">

            </div>
            <div class="form-group">
              <label for="">descrição:</label>
              <textarea type="text" class="form-control" rows="3" id="descricao" name="descricao"></textarea>

            </div>
            <input class="btn" type="submit" value="Cadastrar">
          </div>
        </div>
        <div class="col-md-4">
          <div class="container">

            <input type="file" class="form-control-file" id="imagem" name="imagem">
          </div>
        </div>

    </form>
  </div>

</div>



@endsection