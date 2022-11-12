@extends('layouts.header')

@section('nome', 'Editando: ' . $produto->nome)

@section('conteudo')

<div id="edit">
  <div class="col-12">
    <h2>Editar Produto</h2>
  </div>
  <div class="container">
    <div class="container">
      <form action="/Produtos/update/{{ $produto->id}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row">
          <div class="col-md-8">
            <div class="container">
              <div class="form-group">
                <label for="nome">nome:</label>
                <input type="text" class="form-control" id="nome" name="nome" value="{{$produto->nome}}">
              </div>
              <div class="form-group">
                <label for="preco">Preço:</label>
                <input type="text" class="form-control" id="preco" name="preco" value="{{$produto->preco}}">
              </div>
              <div class="form-group">
                <label for="quantidade">quantidade:</label>
                <input type="number" class="form-control" id="quantidade" name="quantidade" value="{{$produto->quantidade}}">
              </div>
              <div class="form-group">
                <label for="">descrição:</label>
                <textarea type="text" class="form-control" rows="3" id="descricao" name="descricao">{{$produto->descricao}}</textarea>
              </div>
              <div class="form-group">
              <input class="btn" type="submit" value="Salvar">
              </div>
              
            </div>
          </div>
          <div class="col-md-4">
            <div class="container">
              <img src="/img/produtos/{{ $produto->imagem }}" alt="" class="img-thumbnail">
              <input type="file" class="form-control-file" id="imagem" name="imagem">
            </div>
          </div>

      </form>

    </div>

  </div>

</div>


@endsection