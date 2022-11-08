<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>@yield('titulo')</title>

  <link href="https://fonts.googleapis.com/css2?family=Roboto" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">


  <link rel="stylesheet" href="/css/styles.css">
  
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
  <script src="https://kit.fontawesome.com/fbc04c1fa8.js" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/parallax.js/1.4.2/parallax.min.js"></script>
</head>

<body>
  <header>
    <div class="container" id="nav-container">
        <nav class="navbar  navbar-expand-lg ">
            <a class="navbar-brand" href="/">
              Queijos Artesanais
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-links" aria-controls="navbar-links" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbar-links">
              <div class="navbar-nav">
                <a class="nav-item nav-link" href="/">Home</a>
                <a class="nav-item nav-link" href="/Produtos/listar">Queijos</a>                    
                <a class="nav-item nav-link" href="#sobre-area">Sobre</a>
                @guest
                <a class="nav-item nav-link" href="/login">Entrar</a>
                @endguest
                @auth
                <a class="nav-item nav-link" href="/dashboard">Dashboard</a>
                <a class="nav-item nav-link" href="{{ route('carrinho.carrinho')}}"><i class="fa fa-shopping-cart" aria-hidden="true"></i> <span class="badge badge-danger">{{\Cart::getContent()->count()}}</span></a>
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
    <script src="{{ asset('js/app.js') }}"></script>
    @yield('scriptjs')
    <div>
      
      @yield('conteudo')
    </div>

  </main>

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
   
</body>

</html>