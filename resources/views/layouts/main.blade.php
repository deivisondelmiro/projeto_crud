<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">

    <link rel="stylesheet" href="/css/styles.css">
    <script src="/js/scripts.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <div class="container">
        <header>
<nav class="navbar navbar-expand-lg navbar-light">
    <div class="container-fluid">
        <a href="/" class="navbar-brand d-flex align-items-center">
            <img src="/css/img/logo_course_hub.svg" alt="CourseHub" style="height:40px;" title="CourseHub">
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbar">
            <form action="/" method="GET" class=" d-flex mx-auto my-2 my-lg-0" role="search">
                <input class="input-search form-control" type="search" name="search" placeholder="Pesquisar curso...">
                <button class="button-search btn btn-primary" type="submit" title="Pesquisar curso">
                    <ion-icon name="search-outline"></ion-icon>
                </button>
            </form>

            <ul class="navbar-nav ms-auto">

                <li class="nav-item">
                    <a href="/" class="nav-link">Cursos</a>
                </li>

                @auth
                    @if(Auth::user()->is_admin)
                        <li class="nav-item">
                            <a href="/cursos/create" class="nav-link">Criar Curso</a>
                        </li>
                    @endif

                    <li class="nav-item">
                        <a href="/dashboard" class="nav-link">Meus cursos</a>
                    </li>

                    <li class="nav-item">
                        <form action="/logout" method="POST">
                            @csrf
                            <a href="/logout"
                               class="nav-link"
                               onclick="event.preventDefault(); this.closest('form').submit();">
                                Sair
                            </a>
                        </form>
                    </li>
                @endauth

                @guest
                    <li class="nav-item">
                        <a href="/login" class="nav-link">Login</a>
                    </li>
                    <li class="nav-item">
                        <a href="/register" class="nav-link">Cadastrar</a>
                    </li>
                @endguest

            </ul>
        </div>
    </div>
</nav>
        </header>
        <main>
            <div class="container-fluid">
                <div class="row">
                    @if(session('msg'))
                        <p class="msg">{{ session('msg') }}</p>
                    @endif
                    @yield('content')
                </div>
            </div>
        </main>
    </div>
    <footer>
        <p>Feito por <a href="https://github.com/deivisondelmiro" target="_blank">Deivison Delmiro</a> 🎧</p>
    </footer>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        // Adiciona a classe fade-out após 3 segundos
        setTimeout(function() {
            const mensagens = document.querySelectorAll('.msg');
            mensagens.forEach(function(msg) {
                msg.classList.add('fade-out');
            });
        }, 3000);
    });
</script>
</body>
</html>