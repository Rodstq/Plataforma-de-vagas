<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title')</title>

    <!-- Fonte do Google -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto" rel="stylesheet">

    <!-- CSS Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <link rel="stylesheet" href="/css/style.css">

</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-dark py-1 col-md-12 p-3">
            <div class="collapse navbar-collapse " id="navbar">
                <a href="/" class="navbar-brand">
                    <img class="w-50 " src="/img/logo.png" alt="início">
                </a>
                <div class="navbar-nav d-flex justify-content-between col-md-10">
                    <a href="/about" class="nav-link text-light">Sobre</a>
                    <input type="text" class="form-control h-100 w-50" placeholder="Procurar vagas...">

                        
                        @if (Auth::guard('web')->check())
                            <p class="text-light" > Olá, {{ Auth::user()->nome}} ! </p>
                            <a href="/edit" class="text-light"> Editar perfil </a>
                            <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                                @csrf
                                <button type="submit" class="btn btn-danger">Sair</button>
                            </form>
                        @elseif (Auth::guard('empresa')->check())
                            <p class="text-light" > Olá, {{ Auth::guard('empresa')->user()->nome }} !</p>
                            <a href="/edit" class="text-light"> Editar perfil </a>
                            <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                                @csrf
                                <button type="submit" class="btn btn-danger">Sair</button>
                            </form>
                        @else
                            <div>
                                <a href="{{route('registerForms')}}" class="text-decoration-none btn btn-light mx-2">Cadastro</a>
                                <a href="{{route('login')}}" class="text-decoration-none btn btn-light mx-2">Login</a>
                            </div>
                        @endif
                </div>
            </div>
        </nav>
    </header>
    <main style="min-height: 70vh" class="px-5 pt-5 bg-light">
         @yield('content')
    </main>
    <footer class="p-2 footer bg-dark m-0 d-flex flex-row text-light">
        <div class="col d-flex flex-column">
                <a href="" class="text-light text-decoration-none">Links Úteis </a>
                
                <a href="" class="text-light text-decoration-none"> Termos e Condições </a>
                
                <a href="" class="text-light text-decoration-none"> Política de Privacidade </a>
                
                <a href="" class="text-light text-decoration-none"> Fale Conosco </a>
                
                <a href="" class="text-light text-decoration-none"> Redes Sociais </a></li>
            </ul>
        </div>

        <div class="col d-flex align-items-center">
            <p> ADS IFPE - 2024 </p>
        </div>

    </footer>
    <script src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons.js"></script>
</body>

</html>