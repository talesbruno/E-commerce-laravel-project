@extends('layouts.header')


@section('titulo', $pontosturistico->titulo)

@section('conteudo')

<div class="container-fluid">
    <div id="ponto-turistico-info">
        <div class="container">
            <div class="col-12">
                <h1 class="titulo-ponto-turistico">{{ $pontosturistico->titulo}}</h1>
            </div>
            <div class="row">
                <div class="col-md-8">
                    <p>{{ $pontosturistico->descricao }}</p>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <img src="/img/pontosturisticos/{{ $pontosturistico->imagem }}" class="card-img-top" alt="">
                        <div class="card-body">
                            <h5 class="card-title">Informaçoes de contado</h5>
                            <p class="card-text"> {{ $pontosturistico->endereco }}</p>
                            <p class="card-text">{{ $pontosturistico->telefone }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="avaliacao">
        <div class="container">
            <div class="col-12">
                <h5>Avaliações:</h5>
            </div>
            @foreach($pontosturistico->users as $user)

            <div class="feedback-star">
            <h3>{{$user->pivot->nome}}</h3>

                @if($user->pivot->estrela == 1)
                <div class="star-rater">
                    <label for="">Avaliação</label>
                    <span class="span">&#9733;</span>
                </div>
                @elseif($user->pivot->estrela == 2)
                <div class="star-rater">
                    <label for="">Avaliação</label>
                    <span class="span">&#9733;</span>
                    <span class="span">&#9733;</span>
                </div>
                @elseif($user->pivot->estrela == 3)
                <div class="star-rater">
                    <label for="">Avaliação</label>
                    <span class="span">&#9733;</span>
                    <span class="span">&#9733;</span>
                    <span class="span">&#9733;</span>
                </div>
                @elseif($user->pivot->estrela == 4)
                <div class="star-rater">
                    <label for="">Avaliação</label>
                    <span class="span">&#9733;</span>
                    <span class="span">&#9733;</span>
                    <span class="span">&#9733;</span>
                    <span class="span">&#9733;</span>
                </div>
                @else
                <div class="star-rater">
                    <label for="">Avaliação</label>
                    <span class="span">&#9733;</span>
                    <span class="span">&#9733;</span>
                    <span class="span">&#9733;</span>
                    <span class="span">&#9733;</span>
                    <span class="span">&#9733;</span>
                </div>
                @endif
                <h5>{{$user->pivot->comentario}}</h5>
            </div>
            @endforeach
            <form action="/Pontos_Turisticos/join/{{$pontosturistico->id}}" method="POST">
                @csrf
                <h4 class="feedback">Deixe sua avaliação</h4>
                @if($errors->any())
                <ul>
                    @foreach($errors->all() as $error)
                    <li>Selecione a quantidade de estrelas!</li>
                    @endforeach
                </ul>
                @endif
                <div class="estrela">
                    <label for="">Avaliação</label>
                    <input type="radio" id="vazio" name="estrela" value="" required checked>

                    <label for="estrela_um"><i class="fa-solid fa-star"></i></label>
                    <input type="radio" id="estrela_um" name="estrela" value="1">

                    <label for="estrela_dois"><i class="fa-solid fa-star"></i></label>
                    <input type="radio" id="estrela_dois" name="estrela" value="2">

                    <label for="estrela_tres"><i class="fa-solid fa-star"></i></label>
                    <input type="radio" id="estrela_tres" name="estrela" value="3">

                    <label for="estrela_quantro"><i class="fa-solid fa-star"></i></label>
                    <input type="radio" id="estrela_quantro" name="estrela" value="4">

                    <label for="estrela_cinco"><i class="fa-solid fa-star"></i></label>
                    <input type="radio" id="estrela_cinco" name="estrela" value="5">
                </div>
                <div class="form-group">
                    <label for="">Nome:</label>
                    <input type="text" class="form-control w-50" id="nome" name="nome">
                </div>
                <div class="form-group">
                    <label for="">Comentario:</label>
                    <textarea class="form-control w-50" name="comentario" id="comentario" rows="3"></textarea>
                </div>
                <button type="submit" class="btn">Enviar</button>
            </form>

        </div>



    </div>
</div>






@endsection