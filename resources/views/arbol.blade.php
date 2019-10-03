<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <!-- <meta name="viewport" content="width=device-width, initial-scale=1.0" /> -->
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <!-- Compiled and minified Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous" />
    <!-- Minified JS library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!-- Compiled and minified Bootstrap JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link href="{{ asset('css/tree.css') }}" rel="stylesheet">
    <title>Document</title>
 

    <script>
        $(document).ready(function () {
            $("#seccion").hide();
            $("#btn").click(function () {
                $("#seccion").show();
            });
        });

    </script>
</head>

<body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="/public/Logo.png" width="50" height="60" alt="" />
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive"
                aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="#">Inicio
                            <span class="sr-only">(current)</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">American Bully</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Bulldog Francés</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Bulldog Inglés</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Web principal</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <header>
        <img class="imagen" src="https://source.unsplash.com/Dfu5e-tKPtM/1600x900" alt="" />
    </header>


    <div class="text-center">
        <h5 class="display-4">Simulación de cruza</h5>
        <h4 class="mt-5">Padres 2da. Generación</h4>
    </div>
    <div class="container-fluid">

        <div class="row">
            <div class="col2">
                <div class="card card2 mt-5" style="width: 25rem; ">
                    <h4 class="card-title">
                        Padre
                    </h4>
                    <img src="https://source.unsplash.com/SYznSheH-bA/400x400" class="card-img" alt="...">
                    <div class="card-body">
                        <p class="quit">dato 1</p>
                        <p class="quit">dato 2</p>
                    </div>
                </div>




            </div>
            <div class="col2">
                <div class="card card2 mt-5" style="width: 25rem; ">
                    <h4 class="card-title">
                        Padre
                    </h4>
                    <img src="https://source.unsplash.com/SYznSheH-bA/400x400" class="card-img" alt="...">
                    <div class="card-body">
                        <p class="quit">dato 1</p>
                        <p class="quit">dato 2</p>
                    </div>
                </div>




            </div>
        </div>

        <div class="row">
            <div class="col2">
                <h5>Abuelos (3ra. Generación)</h3>
            </div>
            <div class="col2">
                <h5>Abuelos (3ra. Generación)</h3>
            </div>
            <div class="col4">

                <div class="card card2 mt-3 card-der" style="width: 14rem; ">
                    <h4 class="card-title">
                        Padre
                    </h4>
                    <img src="https://source.unsplash.com/SYznSheH-bA/400x400" class="card-img2" alt="...">
                    <div class="card-body">

                    </div>
                </div>
            </div>
            <div class="col4">

                <div class="card card2 mt-3 card-izq" style="width: 14rem; ">
                    <h4 class="card-title">
                        Padre
                    </h4>
                    <img src="https://source.unsplash.com/SYznSheH-bA/400x400" class="card-img2" alt="...">
                    <div class="card-body">

                    </div>
                </div>
            </div>
            <div class="col4">

                <div class="card card2 mt-3 card-der" style="width: 14rem; ">
                    <h4 class="card-title">
                        Padre
                    </h4>
                    <img src="https://source.unsplash.com/SYznSheH-bA/400x400" class="card-img2" alt="...">
                    <div class="card-body">

                    </div>
                </div>
            </div>
            <div class="col4">

                <div class="card card2 mt-3 card-izq" style="width: 14rem; ">
                    <h4 class="card-title">
                        Padre
                    </h4>
                    <img src="https://source.unsplash.com/SYznSheH-bA/400x400" class="card-img2" alt="...">
                    <div class="card-body">

                    </div>
                </div>


            </div>
        </div>

        <div class="row">
            <div class="col2">
                <h5>Bisabuelos (4ta. Generación)</h3>
            </div>
            <div class="col2">
                <h5>Bisabuelos (4ta. Generación)</h3>
            </div>
            <div class="col8">

                <div class="card card2 mt-3 card-der" style="width: 8rem; ">
                    <h4 class="card-title">
                        Padre
                    </h4>
                    <img src="https://source.unsplash.com/SYznSheH-bA/400x400" class="card-img2" alt="...">
                    <div class="card-body">

                    </div>
                </div>
            </div>
            <div class="col8">

                <div class="card card2 mt-3 card-izq" style="width: 8rem; ">
                    <h4 class="card-title">
                        Padre
                    </h4>
                    <img src="https://source.unsplash.com/SYznSheH-bA/400x400" class="card-img2" alt="...">
                    <div class="card-body">

                    </div>
                </div>
            </div>
            <div class="col8">

                <div class="card card2 mt-3 card-der" style="width: 8rem; ">
                    <h4 class="card-title">
                        Padre
                    </h4>
                    <img src="https://source.unsplash.com/SYznSheH-bA/400x400" class="card-img2" alt="...">
                    <div class="card-body">

                    </div>
                </div>
            </div>
            <div class="col8">

                <div class="card card2 mt-3 card-izq" style="width: 8rem; ">
                    <h4 class="card-title">
                        Padre
                    </h4>
                    <img src="https://source.unsplash.com/SYznSheH-bA/400x400" class="card-img2" alt="...">
                    <div class="card-body">

                    </div>
                </div>
            </div>
            <div class="col8">

                <div class="card card2 mt-3 card-der" style="width: 8rem; ">
                    <h4 class="card-title">
                        Padre
                    </h4>
                    <img src="https://source.unsplash.com/SYznSheH-bA/400x400" class="card-img2" alt="...">
                    <div class="card-body">

                    </div>
                </div>
            </div>
            <div class="col8">

                <div class="card card2 mt-3 card-izq" style="width: 8rem; ">
                    <h4 class="card-title">
                        Padre
                    </h4>
                    <img src="https://source.unsplash.com/SYznSheH-bA/400x400" class="card-img2" alt="...">
                    <div class="card-body">

                    </div>
                </div>
            </div>
            <div class="col8">

                <div class="card card2 mt-3 card-der" style="width: 8rem; ">
                    <h4 class="card-title">
                        Padre
                    </h4>
                    <img src="https://source.unsplash.com/SYznSheH-bA/400x400" class="card-img2" alt="...">
                    <div class="card-body">

                    </div>
                </div>
            </div>
            <div class="col8">

                <div class="card card2 mt-3  card-izq" style="width: 8rem; ">
                    <h4 class="card-title">
                        Padre
                    </h4>
                    <img src="https://source.unsplash.com/SYznSheH-bA/400x400" class="card-img2" alt="...">
                    <div class="card-body">

                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col2">
                <h5>Tatarabuelos (5ta. Generación)</h3>
            </div>
            <div class="col2">
                <h5>Tatarabuelos (5ta. Generación)</h3>
            </div>
            <div class="col16">
                <div class="mini-card" style="width: 4rem; ">
                    <img src="https://source.unsplash.com/SYznSheH-bA/400x400" class="card-img2" alt="...">
                    <div class="card-body">
                    </div>
                </div>
            </div>
            <div class="col16">
                <div class="mini-card" style="width: 4rem; ">
                    <img src="https://source.unsplash.com/SYznSheH-bA/400x400" class="card-img2" alt="...">
                    <div class="card-body">
                    </div>
                </div>
            </div>
            <div class="col16">
                <div class="mini-card" style="width: 4rem; ">
                    <img src="https://source.unsplash.com/SYznSheH-bA/400x400" class="card-img2" alt="...">
                    <div class="card-body">
                    </div>
                </div>
            </div>
            <div class="col16">
                <div class="mini-card" style="width: 4rem; ">
                    <img src="https://source.unsplash.com/SYznSheH-bA/400x400" class="card-img2" alt="...">
                    <div class="card-body">
                    </div>
                </div>
            </div>
            <div class="col16">
                <div class="mini-card" style="width: 4rem; ">
                    <img src="https://source.unsplash.com/SYznSheH-bA/400x400" class="card-img2" alt="...">
                    <div class="card-body">
                    </div>
                </div>
            </div>
            <div class="col16">
                <div class="mini-card" style="width: 4rem; ">
                    <img src="https://source.unsplash.com/SYznSheH-bA/400x400" class="card-img2" alt="...">
                    <div class="card-body">
                    </div>
                </div>
            </div>
            <div class="col16">
                <div class="mini-card" style="width: 4rem; ">
                    <img src="https://source.unsplash.com/SYznSheH-bA/400x400" class="card-img2" alt="...">
                    <div class="card-body">
                    </div>
                </div>
            </div>
            <div class="col16">
                <div class="mini-card" style="width: 4rem; ">
                    <img src="https://source.unsplash.com/SYznSheH-bA/400x400" class="card-img2" alt="...">
                    <div class="card-body">
                    </div>
                </div>
            </div>
            <div class="col16">
                <div class="mini-card" style="width: 4rem; ">
                    <img src="https://source.unsplash.com/SYznSheH-bA/400x400" class="card-img2" alt="...">
                    <div class="card-body">
                    </div>
                </div>
            </div>
            <div class="col16">
                <div class="mini-card" style="width: 4rem; ">
                    <img src="https://source.unsplash.com/SYznSheH-bA/400x400" class="card-img2" alt="...">
                    <div class="card-body">
                    </div>
                </div>
            </div>
            <div class="col16">
                <div class="mini-card" style="width: 4rem; ">
                    <img src="https://source.unsplash.com/SYznSheH-bA/400x400" class="card-img2" alt="...">
                    <div class="card-body">
                    </div>
                </div>
            </div>
            <div class="col16">
                <div class="mini-card" style="width: 4rem; ">
                    <img src="https://source.unsplash.com/SYznSheH-bA/400x400" class="card-img2" alt="...">
                    <div class="card-body">
                    </div>
                </div>
            </div>
            <div class="col16">
                <div class="mini-card" style="width: 4rem; ">
                    <img src="https://source.unsplash.com/SYznSheH-bA/400x400" class="card-img2" alt="...">
                    <div class="card-body">
                    </div>
                </div>
            </div>
            <div class="col16">
                <div class="mini-card" style="width: 4rem; ">
                    <img src="https://source.unsplash.com/SYznSheH-bA/400x400" class="card-img2" alt="...">
                    <div class="card-body">
                    </div>
                </div>
            </div>
            <div class="col16">
                <div class="mini-card" style="width: 4rem; ">
                    <img src="https://source.unsplash.com/SYznSheH-bA/400x400" class="card-img2" alt="...">
                    <div class="card-body">
                    </div>
                </div>
            </div>
            <div class="col16">
                <div class="mini-card" style="width: 4rem; ">
                    <img src="https://source.unsplash.com/SYznSheH-bA/400x400" class="card-img2" alt="...">
                    <div class="card-body">
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

    <footer id="sticky-footer" class="py-4 bg-dark text-white-50">
        <div class="container text-center">
            <small>&copy; 2019 DERECHOS RESERVADOS. REALIZADO POR
                <a class="link" href="https://club.colorfussionkc.com/">COLOR FUSSION</a></small>
        </div>
    </footer>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
        integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
        integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous">
    </script>
</body>

</html>
