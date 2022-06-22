<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('titulo')</title>

    <link href="https://fonts.googleapis.com/css2?family=Open+Sans" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">


    <link rel="stylesheet" href="/css/styles.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/fbc04c1fa8.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/parallax.js/1.4.2/parallax.min.js"></script>
</head>

<body>
    <header>
        <div class="container" id="nav-container">
            <nav class="navbar fixed-top navbar-expand-lg ">
                <a class="navbar-brand" href="/">
                    <img id="logo" src="./img/logot.png" alt="">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-links" aria-controls="navbar-links" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-end" id="navbar-links">
                    <div class="navbar-nav">
                        <a class="nav-item nav-link" href="/">Inicio</a>
                        <a class="nav-item nav-link" href="/">Hospedagem</a>
                        <a class="nav-item nav-link" href="/Pontos_Turisticos/listar">Pontos Turísticos</a>
                        <a class="nav-item nav-link" href="/">Comer e Beber</a>
                        <a class="nav-item nav-link" href="/">Sobre</a>
                        @guest
                        <a class="nav-item nav-link" href="/login">Entrar</a>
                        @endguest
                        @auth
                        <a class="nav-item nav-link" href="/dashboard">Meus Locais</a>
                        <form action="/logout" method="POST">
                            @csrf
                            <a class="nav-item nav-link" href="/logout" onclick="event.preventDefault();
                    this.closest('form').submit();">Sair</a>
                        </form>
                        @endauth
                    </div>
                </div>
            </nav>
        </div>
    </header>
    <main>
        <div class="container-fluid">
            <div id="principal">
                <div class="row align-items-center">
                    <div class="col-md-4 ">
                        <div class="container">
                        <h1 class="titulo ">Bem-vindo a</h1>
                        <h1 class="titulos ">PORTEIRINHA</h1>
                        <div class="input-group ">
                            <div class="form-outline">
                                <form action="/" method="GET">
                                    <input type="text" id="pesquisa" name="pesquisa" class="form-control " placeholder="O que você está procurando?" />
                            </div>
                            <button type="submit" class="btn btn-primary">
                                </form>
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                        </div>
                        
                    </div>
                    <div class="col-md-8 nopadding">
                        <img class="img-fluid" src="img/1.png" alt="">
                    </div>
                </div>
            </div>
            <div id="busca">
                <div class="container">
                    <div class="row">
                        @if($pesquisa)
                        <div class="col-12">
                            <h2 class="buscando">Buscando por: {{$pesquisa}}</h2>
                        </div>
                        @foreach($pontosturisticos as $pontosturistico)
                        <div class="col-sm-3">
                            <div class="card">
                                <img src="/img/pontosturisticos/{{ $pontosturistico->imagem }}" class="card-img-top" alt="">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $pontosturistico->titulo}}</h5>
                                    <p class="card-text"></p>
                                    <a class="btn" href="/Pontos_Turisticos/{{ $pontosturistico->id }}">Ver mais</a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        @endif
                    </div>
                </div>
                @if(count($pontosturisticos)==0 && $pesquisa)
                <p>Não foi possível encontrar nenhum local com {{$pesquisa}}! <a href="/Pontos_Turisticos/listar">Ver Todos</a></p>
                @endif
                <div>
                    @if(session('msg'))
                    <p>{{ session('msg') }}</p>
                    @endif
                </div>
            </div>
            <footer>
                <div id="copy-area">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <p>Tales e Matheus &copy; 2022</p>
                            </div>
                        </div>
                    </div>
                </div>
            </footer>
        </div>


    </main>

    @yield('conteudo')

    <script src="{{ asset('js/script.js') }}"></script>
    <script src="{{ asset('js/script2.js') }}"></script>
</body>

</html>