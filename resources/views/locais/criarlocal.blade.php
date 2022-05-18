@extends('layouts.header')

@section('titulo', 'Cadastrar Local')

@section('conteudo')

<div>
<form action="/Cadastrar_Novo_Local"  method="POST" enctype="multipart/form-data">
  @csrf
    <label for="titulo">Titulo:</label>
    <input type="text" id="titulo" name ="titulo"><br><br>
    <label for="">descrição:</label>
    <textarea type="text" id="descricao" name ="descricao"></textarea><br><br>
    <label for="imagem">imagem:</label>
    <input type="file" id="imagem" name ="imagem"><br><br>
    <input type="submit" value="Cadastrar">
  </form>
</div>



@endsection