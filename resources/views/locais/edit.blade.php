@extends('layouts.header')

@section('titulo', 'Editando: ' . $pontosturistico->titulo)

@section('conteudo')

<div id="edit">
  <div class="col-12">
    <h2>Editar Local</h2>
  </div>
  <div class="container">
    <div class="container">
      <form action="/Pontos_Turisticos/update/{{ $pontosturistico->id}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row">
          <div class="col-md-8">
            <div class="container">
              <div class="form-group">
                <label for="titulo">Titulo:</label>
                <input type="text" class="form-control" id="titulo" name="titulo" value="{{$pontosturistico->titulo}}">
              </div>
              <div class="form-group">
                <label for="endereco">Endereço:</label>
                <input type="text" class="form-control" id="endereco" name="endereco" value="{{$pontosturistico->endereco}}">
              </div>
              <div class="form-group">
                <label for="telefone">Telefone:</label>
                <input type="text" class="form-control" id="telefone" name="telefone" value="{{$pontosturistico->telefone}}">
              </div>
              <div class="form-group">
                <label for="">descrição:</label>
                <textarea type="text" class="form-control" rows="3" id="descricao" name="descricao">{{$pontosturistico->descricao}}</textarea>
              </div>
              <div class="form-group">
              <input class="btn" type="submit" value="Salvar">
              </div>
              
            </div>
          </div>
          <div class="col-md-4">
            <div class="container">
              <img src="/img/pontosturisticos/{{ $pontosturistico->imagem }}" alt="" class="img-thumbnail">
              <input type="file" class="form-control-file" id="imagem" name="imagem">
            </div>
          </div>

      </form>

    </div>

  </div>

</div>


@endsection