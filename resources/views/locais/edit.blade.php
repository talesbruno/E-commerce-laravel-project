@extends('layouts.header')

@section('titulo', 'Editando: ' . $pontosturistico->titulo)

@section('conteudo')

<div>
<form action="/Pontos_Turisticos/update/{{ $pontosturistico->id}}"  method="POST" enctype="multipart/form-data">
  @csrf
  @method('PUT')
    <label for="titulo">Titulo:</label>
    <input type="text" id="titulo" name ="titulo" value="{{$pontosturistico->titulo}}"><br><br>
    <label for="">descrição:</label>
    <textarea type="text" id="descricao" name ="descricao">{{$pontosturistico->descricao}}</textarea><br><br>
    <label for="imagem">imagem:</label>
    <input type="file" id="imagem" name ="imagem"><br><br>
    <img src="/img/pontosturisticos/{{ $pontosturistico->imagem }}" alt="" width="100px" height="100px">
    <input type="submit" value="Cadastrar">
  </form>
</div>



@endsection