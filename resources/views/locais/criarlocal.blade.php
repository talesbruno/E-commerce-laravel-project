@extends('layouts.header')

@section('titulo', 'Cadastrar Local')

@section('conteudo')

<div>
@if($errors->any())
        <ul>
            @foreach($errors->all() as $error)
            <li>{{$error}}</li>
            @endforeach
        </ul>
        @endif
<form action="/Cadastrar_Novo_Local"  method="POST" enctype="multipart/form-data">
  @csrf 
    <label for="titulo">Titulo:</label>
    <input type="text" id="titulo" name ="titulo"><br><br>
    <label for="endereco">Endereço:</label>
    <input type="text" id="endereco" name ="endereco"><br><br>
    <label for="telefone">Telefone:</label>
    <input type="text" id="telefone" name ="telefone"><br><br>
    <label for="">descrição:</label>
    <textarea type="text" id="descricao" name ="descricao"></textarea><br><br>
    <label for="imagem">imagem:</label>
    <input type="file" id="imagem" name ="imagem"><br><br>
    <input type="submit" value="Cadastrar">
  </form>
</div>



@endsection