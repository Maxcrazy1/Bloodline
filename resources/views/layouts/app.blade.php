<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta http-equiv="X-UA-Compatible" content="ie=edge" />
        <!-- Compiled and minified Bootstrap CSS -->
        <link
            rel="stylesheet"
            href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
            integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO"
            crossorigin="anonymous"
        />
        <!-- Minified JS library -->
        <!-- Compiled and minified Bootstrap JavaScript -->

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <title>Document</title>
        <style>
      body{
          width: 100% !important;
          background-color: #343a40;
      }
            .carousel-item {
                height: 90.4vh;
                min-height: 350px;
                background: no-repeat center center scroll;
                -webkit-background-size: cover;
                -moz-background-size: cover;
                -o-background-size: cover;
                background-size: cover;
            }
.link{
    color:#82BA3D;
}
            .navbar {
                background: rgba(255, 255, 255, 0.4);
            }

        </style>

    <title>Laravel - @yield('title')</title>
</head>

<body>
        <nav class="navbar navbar-expand-lg navbar-light fixed-top">
                <div class="container">
                        <a class="navbar-brand" href="#">
                                <img src="{{ asset('Logo.png') }}" width="50" height="60" alt="">
                              </a>
                    <button
                        class="navbar-toggler"
                        type="button"
                        data-toggle="collapse"
                        data-target="#navbarResponsive"
                        aria-controls="navbarResponsive"
                        aria-expanded="false"
                        aria-label="Toggle navigation"
                    >
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarResponsive">
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item active">
                                <a class="nav-link" href="#"
                                    >Inicio
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
    @yield('content')

    <footer id="sticky-footer" class="py-4 bg-dark text-white-50">
            <div class="container text-center">
                <small>&copy; 2019 DERECHOS RESERVADOS. REALIZADO POR  <a class="link"  href="https://club.colorfussionkc.com/">COLOR FUSSION</a></small>
            </div>
        </footer>
    <script
        src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"
    ></script>
    <script
        src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
        integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
        crossorigin="anonymous"
    ></script>
    <script
        src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
        integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
        crossorigin="anonymous"
    ></script>
</body>

</html>