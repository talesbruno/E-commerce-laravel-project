@extends('layouts.header')


@section('titulo', $pontosturistico->titulo)

@section('conteudo')

<div>
    <div>
        <img src="/img/pontosturisticos/{{ $pontosturistico->imagem }}" alt="" width="50px" height="50px">
    </div>
    <div>
        <h5>{{ $pontosturistico->titulo}}</h5>
        <p>Criado por: {{ $donoDoLocal['name']}}</p>
        <p>{{ $pontosturistico->descricao }}</p>
    </div>
</div>

<div>
    <h3>Avaliações:</h3>
    
    @foreach($pontosturistico->users as $user)
    
    <div>
        @if($user->pivot->estrela == 1)
        <div class="star-rater">
        <p>Avaliação</p>
            <span class="span">&#9733;</span>
        </div>
        @elseif($user->pivot->estrela == 2)
        <div class="star-rater">
        <p>Avaliação</p>
            <span class="span">&#9733;</span>
            <span class="span">&#9733;</span>
        </div>
        @elseif($user->pivot->estrela == 3)
        <div class="star-rater">
        <p>Avaliação</p>
            <span class="span">&#9733;</span>
            <span class="span">&#9733;</span>
            <span class="span">&#9733;</span>
        </div>
        @elseif($user->pivot->estrela == 4)
        <div class="star-rater">
            <p>Avaliação</p>
            <span class="span">&#9733;</span>
            <span class="span">&#9733;</span>
            <span class="span">&#9733;</span>
            <span class="span">&#9733;</span>
        </div>
        @else
        <div class="star-rater">
        <p>Avaliação</p>
            <span class="span">&#9733;</span>
            <span class="span">&#9733;</span>
            <span class="span">&#9733;</span>
            <span class="span">&#9733;</span>
            <span class="span">&#9733;</span>
        </div>
        @endif
        <h1>Comentario:</h1>
        <h5>{{$user->pivot->comentario}}</h5><br>
        
    </div>
    @endforeach
    
    
</div>


<div>
    <form action="/Pontos_Turisticos/join/{{$pontosturistico->id}}" method="POST">
        @csrf
        <h1>Deixe sua avaliação</h1>
        
        <div class="estrela">
            <label for="">avaliação</label>
            <input type="radio" id="vazio" name="estrela" value="" checked>

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
        <label for="">Comentario:</label>
        <textarea type="text" name="comentario" id="comentario"></textarea>
        <input type="submit">
    </form>
</div>




@endsection