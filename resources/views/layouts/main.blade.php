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
                <li><a href="#">Sobre</a></li>
                <li><a href="/Pontos_Turisticos/listar">Pontos Turísticos</a></li>
                <li><a href="/">Hospedagem</a></li>
                <li><a href="#">Comer e Beber</a></li>
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
        
        </div>
      <section class="textoprincipal">

      <div class="slider">
      <div class="slides">    
       
         <input type="radio" name="radio-btn" id="radio1">
         <input type="radio" name="radio-btn" id="radio2">
         <input type="radio" name="radio-btn" id="radio3">
         <input type="radio" name="radio-btn" id="radio4">
        

           
         <div class="slide first">
             <img src="./img/1.png" alt="imagem 1"/>
         </div>
         <div class="slide">
             <img src="./img/2.png" alt="imagem 2"/>
         </div>
         <div class="slide">
             <img src="./img/3.png" alt="imagem 3"/>
         </div>
         <div class="slide">
             <img src="./img/4.png" alt="imagem 4"/>
         </div>
        

        
       <div class="navigation-auto">
           <div class="auto-btn1"></div>
           <div class="auto-btn2"></div>
           <div class="auto-btn3"></div>
           <div class="auto-btn4"></div>
       </div>
        
    </div>

      <div class="manual-navigation">
          <label for="radio1" class="manual-btn"></label>
          <label for="radio2" class="manual-btn"></label>
          <label for="radio3" class="manual-btn"></label>
          <label for="radio4" class="manual-btn"></label>
      </div>  
    </div>
        
      <div class="titulos">
      <h1 >Bem-vindo a</h1>
      <h1 >PORTEIRINHA</h1>
        <div class="barra">
            <form action="/" method="GET">
            <input type="text" id="pesquisa" name="pesquisa" class="bar" placeholder="O que você está procurando?">
            <button type="submit" class="botaobar">
            </form>
      
        <i class="fa fa-search"></i>
     </button>
     </div>
   </div>
   
   </section>
 </main>
 @yield('conteudo')
    <footer>
        <p>Tales e Matheus &copy; 2022</p>
    </footer>
    <script src="{{ asset('js/script.js') }}"></script>
    <script src="{{ asset('js/script2.js') }}"></script>
</body>

</html>