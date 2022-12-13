<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield('title')</title>

        <!-- Fonte do Google -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Playfair+Display+SC:wght@900&family=Roboto" rel="stylesheet">
        <!-- CSS da Bootstrap -->   
        <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
        <!-- CSS da aplicação -->
        
        <link rel="stylesheet" href="/css/style.css">
        <script src="/js/script.js"></script>

    </head>
    <body>
        <header>
            <nav class="navbar navbar-expand-lg navbar-light">
                <div class="collapse navbar-collapse" id="navbar">
                    <a href="/" class="navbar-brnd">
                        <img src="/img/logo_raposa.png" alt="HDC Events">
                        FoxEvents
                    </a>
                    <ul class="navbar-nav">                        
                        <li class="nav-item">
                            <a href="/products/productsList" class="nav-link">Produtos</a>                            
                        </li>
                        <li class="nav-item">
                            <a href="/usuario/usuarioList" class="nav-link">Usuarios</a>                             
                        </li>
                        @auth
                            <li class="nav-item">
                                <a href="/dashboard" class="nav-link">Relatorio</a>                            
                            </li>
                            <li class="nav-item">
                               <form action="/logout" method="post">
                                @csrf
                                <a href="/logout" 
                                class="nav-link"
                                onclick="event.preventDefault();
                                this.closest('form').submit();">Sair</a>
                               </form>                           
                            </li>
                        @endauth
                        @guest
                        <li class="nav-item">
                            <a href="/login" class="nav-link">Entrar</a>                            
                        </li>
                        <li class="nav-item">
                            <a href="/register" class="nav-link">cadastrar</a>                            
                        </li>
                        @endguest
                    </ul>                   
                </div>
            </nav>
        </header>
    
        <main>
            <div class="container-fuid">
                <div class="row">
                    @if(session('msg'))
                        <p class="msg">{{ session('msg') }}</p>
                    @endif
                    @yield('content')
                </div>
            </div>
        </main>

        
        <footer>
            <p>Copyright &copy; 2022<p>
        </footer> 
        <script src="https://unpkg.com/ionicons@5.1.2/dist/ionicons.js"></script>
    </body>
    
</html>