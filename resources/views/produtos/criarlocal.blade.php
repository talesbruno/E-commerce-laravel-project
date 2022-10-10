@extends('layouts.header')

@section('nome', 'Cadastrar Local')

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
    <h2>Cadastrar Local</h2>
  </div>
  <div class="container">
    <div class="container">

      <form action="/Cadastrar_Novo_Local" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
          <div class="col-md-8">
            <div class="container">
              <div class="form-group">
                <label for="nome">nome:</label>
                <input type="text" class="form-control" id="nome" name="nome" >
              </div>
              <div class="form-group">
                <label for="preco">Preço:</label>
                <input type="text" class="form-control" id="preco" name="preco" >
              </div>
              <div class="form-group">
                <label for="quantidade">quantidade:</label>
                <input type="number" class="form-control" id="quantidade" name="quantidade" >
              </div>
              <div class="form-group">
                <label for="">descrição:</label>
                <textarea type="text" class="form-control" rows="3" id="descricao" name="descricao"></textarea>
              </div>
              <div class="form-group">
                <input class="btn" type="submit" value="Cadastrar">
              </div>

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

</div>



@endsection