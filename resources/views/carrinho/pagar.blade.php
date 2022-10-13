@extends('layouts.header')
@section('titulo', 'Triport')

@section('scriptjs')
<script type="text/javascript" src="https://stc.sandbox.pagseguro.uol.com.br/pagseguro/api/v2/checkout/pagseguro.directpayment.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script>
  function carregar(){
    PagSeguroDirectPayment.setSessionId('{{ $sessionID }}')
  }
  $(function(){
    carregar();

    $(".cartaodecredito").on('blur', function(){
      PagSeguroDirectPayment.onSenderHasReady(function(response){
        if(response.status == 'error'){
          console.log(response.message)
          return false
        }

        var hash = response.senderHash
        $(".hashseller").val(hash)
      })
      let cartaldecredito = $(this).val()
      $(".bandeira").val("")
      if(cartaldecredito.length > 6){
        let prefixocartao = cartaldecredito.substr(0,6)
        PagSeguroDirectPayment.getBrand({
          cardBin : prefixocartao,
          success : function(response){
            $(".bandeira").val(response.brand.name)
          },
          error : function(response){
            alert("numero do cartao invalido")
           
          }
        })
      }
    })
      $(".parcelas").on('blur', function(){
          var bandeira = $(".bandeira").val();
          var totalParcelas = $(this).val();
          if(bandeira == ""){
            alert("preencha numero do cartao valido")
            return ;
          }
          PagSeguroDirectPayment.getInstallments({
            amount : $(".valortotal").val(),
            maxIntallmentNoInteres : 2,
            brad : bandeira,
            success : function(response){
              console.log(response);
              let status = response.error
              if(status){
                alert("nao foi encontrado op de parcelamento")
                return ;
              }
              let indice = totalParcelas - 1;
              let totalapagar = response.installments[bandeira][indice].totalAmount
              let valorTotalParcela = response.installments[bandeira][indice].installmentAmount

              $(".totalparcela").val(valorTotalParcela)
              $(".totalapagar").val(totalapagar)
            }
          })
      })
    })
</script>
@endsection
@section('conteudo')

<div id="listar-locais">
    <div class="container">
      <h5>Valor total:R$: {{number_format(\Cart::getTotal(),2,',','.')}}</h5>
        <form action="#" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
              <div class="col-md-8">
                <div class="container">
                  <input type="text" name="hashseller" id="hashseller" class="hashseller">
                  <input type="text" name="bandeira" id="bandeira" class="bandeira">
                  <div class="form-group">
                    <label for="cartaodecredito">cartão de credito:</label>
                    <input type="text" class="cartaodecredito form-control" id="cartaodecredito" name="cartaodecredito" >
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
                    <input type="text" class="parcelas form-control" id="parcelas" name="parcelas" >
                  </div>
                  <div class="form-group">
                    <label for="valortotal">Valor total:</label>
                    <input type="text" class="form-control" readonly value="{{number_format(\Cart::getTotal(),2,',','.')}}" id="valortotal" name="valortotal" >
                  </div>
                  <div class="form-group">
                    <label for="valordeparcelas">Valor de parcelas:</label>
                    <input type="text" class="form-control" id="valordeparcelas" name="valordeparcelas" >
                  </div>
                  <div class="form-group">
                    <label for="totalapagar">total a pagar:</label>
                    <input type="text" class="totalapagar form-control"  id="totalapagar" name="totalapagar" >
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