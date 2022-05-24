<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('titulo')</title>

    <link href="https://fonts.googleapis.com/css2?family=Roboto" rel="stylesheet">

    <link rel="stylesheet" href="/css/styles.css">

    
</head>

<body>
    <header>
        <nav>
            <div class="logo">
                <img src="./img/logo.png">
            </div>
            <div class="mobile-menu">
                <div class="line1"></div>
                <div class="line2"></div>
                <div class="line3"></div>
            </div>
            <ul class="nav-list">
                <li><a href="/">Inicio</a></li>
                <li><a href="/">Sobre</a></li>
                <li><a href="/Pontos_Turisticos/listar">Pontos Turísticos</a></li>
                <li><a href="/">Hospedagem</a></li>
                <li><a href="/">Comer e Beber</a></li>
                @guest
                <li><a href="/login">Entrar</a></li>
                @endguest
                @auth
                <li><a href="/dashboard">Meus Locais</a></li>
                <li><form action="/logout" method="POST">
                    @csrf
                    <a href="/logout" onclick="event.preventDefault();
                    this.closest('form').submit();">Sair</a>
                </form></li>
                @endauth
            </ul>
        </nav>
    </header>
    
    <main>
        <div>
            @if(session('msg'))
                <p>{{ session('msg') }}</p>
                @endif
        @yield('conteudo')
        </div>
      
 </main>
    <footer>
        <p>Tales e Matheus &copy; 2022</p>
    </footer>
</body>

</html>