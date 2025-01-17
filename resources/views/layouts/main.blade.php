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
    <header >
        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="collapse navbar-collapse" id="navbar">
                <a href="/" class="navbar-brand">
                    <img class="w-25" src="/img/logo.png" alt="início">
                </a>
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a href="/about" class="nav-link">Sobre</a>
                    </li>
                    <li class="nav-item">
                        <input type="text" placeholder="Procurar vagas...">
                    </li>
                    <li class="nav-item">
                        <a href="/events/create" class="nav-link">Criar Eventos</a>
                    </li>
                    <li class="nav-item">
                        <a href="/register" class="nav-link">Cadastro</a>
                    </li>
                    <li class="nav-item">
                        <a href="/login" class="nav-link">Login</a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
    @yield('content')
    <footer class="footer">
        <div>
            <ul>
                <li><a href="" class="link"> Links Úteis </a>
                </li>
                <li><a href="" class="link"> Termos e Condições </a>
                </li>
                <li><a href="" class="link"> Política de Privacidade </a>
                </li>
                <li><a href="" class="link"> Fale Conosco </a>
                </li>
                <li><a href="" class="link"> Redes Sociais </a></li>
            </ul>
        </div>

        <div>
            <p> ADS IFPE - 2024 </p>
        </div>

    </footer>
    <script src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons.js"></script>
</body>

</html>