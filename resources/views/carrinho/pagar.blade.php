@extends('layouts.header')
@section('titulo', 'Triport')
@section('conteudo')

<div id="listar-locais">
    <div class="container">
        <form action="#" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
              <div class="col-md-8">
                <div class="container">
                  <div class="form-group">
                    <label for="cartaodecredito">cartão de credito:</label>
                    <input type="text" class="form-control" id="cartaodecredito" name="cartaodecredito" >
                  </div>
                  <div class="form-group">
                    <label for="cvv">CVV:</label>
                    <input type="text" class="form-control" id="cvv" name="cvv" >
                  </div>
                  <div class="form-group">
                    <label for="mesdeexpiracao">Mês de expiraão:</label>
                    <input type="text" class="form-control" id="mesdeexpiracao" name="mesdeexpiracao" >
                  </div>
                  <div class="form-group">
                    <label for="anodeexpiracao">Ano de expiração:</label>
                    <input type="text" class="form-control" id="anodeexpiracao" name="anodeexpiracao" >
                  </div>
                  <div class="form-group">
                    <label for="nomedocartao">Nome do cartão:</label>
                    <input type="text" class="form-control" id="nomedocartao" name="nomedocartao" >
                  </div>
                  <div class="form-group">
                    <label for="parcelas">Parcelas:</label>
                    <input type="text" class="form-control" id="parcelas" name="parcelas" >
                  </div>
                  <div class="form-group">
                    <label for="valortotal">Valor total:</label>
                    <input type="text" class="form-control" id="valortotal" name="valortotal" >
                  </div>
                  <div class="form-group">
                    <label for="valordeparcelas">Valor de parcelas:</label>
                    <input type="text" class="form-control" id="valordeparcelas" name="valordeparcelas" >
                  </div>
                  <div class="form-group">
                    <input class="btn btn-success" type="submit" value="Pagar">
                  </div>
    
                </div>
              </div>
          </form>   
    </div>    
</div>
@endsection