@extends('layouts.header')

@section('nome', 'Cadastrar pagseguro')

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
    <h2>Cadastrar pagseguro</h2>
  </div>
  <div class="container">
    <div class="container">

      <form action="{{route('pagseguro.addpagseguro')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
          <div class="col-md-8">
            <div class="container">
              <div class="form-group">
                <label for="pagseguroemail">pagseguro email:</label>
                <input type="text" class="form-control" id="pagseguroemail" name="pagseguroemail" >
              </div>
              <div class="form-group">
                <label for="pagsegurotoken">pagseguro token:</label>
                <input type="text" class="form-control" id="pagsegurotoken" name="pagsegurotoken" >
              </div>
             
              <div class="form-group">
                <input class="btn" type="submit" value="Cadastrar">
              </div>

            </div>
          </div>
         

      </form>

    </div>

  </div>

</div>



@endsection