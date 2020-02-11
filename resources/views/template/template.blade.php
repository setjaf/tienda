<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('tituloPagina','Tienda')</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    @yield('header')

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>
<body>

    <header class="w-100 container-fluid bg-dark">

        <div class="row justify-content-between px-3">

            <div class="title text-light">
                <h1>
                    @yield('nombreTienda','Tienda')
                </h1>
            </div>

            <div class="menu col-md-4 my-auto">
                <ul class="nav justify-content-around">
                    {{-- <li class="nav-item ">
                        <a href="/nueva" class="text-light ">Crear nueva tienda</a>
                    </li>
                    <li class="nav-item">
                        <a href="#">Crear nuevo usuario</a>
                    </li> --}}
                </ul>
            </div>
        </div>

    </header>

    <main class="container min-vh-100 py-5">
        @yield('contenido')
    </main>

    <footer class="w-100 container-fluid bg-dark">

        <div class="row justify-content-center">
            <span class="text-light"> by setjafet </span>
        </div>

    </footer>

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

    @yield('modales')

    @yield('scripts')

</body>
</html>
