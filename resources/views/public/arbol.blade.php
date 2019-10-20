
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />

    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">

    <script src="{{ URL::asset('js/core/jquery.min.js') }}"></script>
    <link href="{{ asset('css/tree.css') }}" rel="stylesheet">
    <title>Document</title>

</head>
<body>
    <!-- Navigation -->
    <header>
            <input type="checkbox" id="btn-menu" />
            <label for="btn-menu"><i class="fa fa-bars" style="color: #B7B9C4"></i></label>
            <nav class="main-menu">
                <ul>
                    <li> <a href="#" class="active"> Inicio</a></li>
                    <li class="submenu"><a href="#">American Bully</i></a>
    
                    </li>
                    <li class="submenu"><a href="#">Bulldog Francés</a>
    
                    </li>
                    <li><a href="#">Bulldog Inglés</a></li>
                    <li><a href="#">Web principal</a></li>
                </ul>
            </nav>
        </header>

    <div class="img-top">
        <img class="imagen" src="https://source.unsplash.com/Dfu5e-tKPtM/1600x900" alt="" />
    </div>


    <div class="text-center">
        <h5 class="display-4">Simulación de cruza</h5>
        <h4 class="mt-5">Padres 2da. Generación</h4>
    </div>
    <div class="container-fluid">

        <div class="row">
            <div class="col2">
                <div class="card card2 mt-5" style="width: 25rem; ">
                    <h4 class="card-title">
                        {{ $family["Ejemplar Macho"][0]->name}}
                    </h4>
                    <img src="{{URL::asset('/media/'.$family["Ejemplar Macho"][0]->medias[0]->src)}}" class="card-img" alt="...">
                    <div class="card-body">
                        <p class="quit">dato 1</p>
                        <p class="quit">dato 2</p>
                    </div>
                </div>




            </div>
            <div class="col2">
                <div class="card card2 mt-5" style="width: 25rem; ">
                    <h4 class="card-title">
                        {{$family["Ejemplar Hembra"][0]->name}}
                    </h4>
                    <img src="{{URL::asset('/media/'.$family["Ejemplar Macho"][0]->medias[0]->src)}}" class="card-img" alt="...">
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
                        {{ $family["Macho"][0]["Segunda generacion"][0]->name}}
                    </h4>
                    <img src="https://source.unsplash.com/SYznSheH-bA/400x400" class="card-img2" alt="...">
                    <div class="card-body">

                    </div>
                </div>
            </div>
            <div class="col4">

                <div class="card card2 mt-3 card-izq" style="width: 14rem; ">
                    <h4 class="card-title">
                        {{$family["Macho"][0]["Segunda generacion"][1]->name}}
                    </h4>
                    <img src="https://source.unsplash.com/SYznSheH-bA/400x400" class="card-img2" alt="...">
                    <div class="card-body">

                    </div>
                </div>
            </div>
            <div class="col4">

                <div class="card card2 mt-3 card-der" style="width: 14rem; ">
                    <h4 class="card-title">
                        {{ $family["Hembra"][0]["Segunda generacion"][1]->name}}
                    </h4>
                    <img src="https://source.unsplash.com/SYznSheH-bA/400x400" class="card-img2" alt="...">
                    <div class="card-body">

                    </div>
                </div>
            </div>
            <div class="col4">

                <div class="card card2 mt-3 card-izq" style="width: 14rem; ">
                    <h4 class="card-title">
                        {{ $family["Hembra"][0]["Segunda generacion"][0]->name}}
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
                        {{$family["Macho"][0]["Tercera generacion"][0]->name}}
                    </h4>
                    <img src="https://source.unsplash.com/SYznSheH-bA/400x400" class="card-img2" alt="...">
                    <div class="card-body">

                    </div>
                </div>
            </div>
            <div class="col8">

                <div class="card card2 mt-3 card-izq" style="width: 8rem; ">
                    <h4 class="card-title">
                        {{$family["Macho"][0]["Tercera generacion"][1]->name}}
                    </h4>
                    <img src="https://source.unsplash.com/SYznSheH-bA/400x400" class="card-img2" alt="...">
                    <div class="card-body">

                    </div>
                </div>
            </div>
            <div class="col8">

                <div class="card card2 mt-3 card-der" style="width: 8rem; ">
                    <h4 class="card-title">
                        {{$family["Macho"][0]["Tercera generacion"][2]->name}}

                    </h4>
                    <img src="https://source.unsplash.com/SYznSheH-bA/400x400" class="card-img2" alt="...">
                    <div class="card-body">

                    </div>
                </div>
            </div>
            <div class="col8">

                <div class="card card2 mt-3 card-izq" style="width: 8rem; ">
                    <h4 class="card-title">
                        {{$family["Macho"][0]["Tercera generacion"][3]->name}}
                    </h4>
                    <img src="https://source.unsplash.com/SYznSheH-bA/400x400" class="card-img2" alt="...">
                    <div class="card-body">

                    </div>
                </div>
            </div>
            <div class="col8">

                <div class="card card2 mt-3 card-der" style="width: 8rem; ">
                    <h4 class="card-title">
                        {{$family["Hembra"][0]["Tercera generacion"][0]->name}}

                    </h4>
                    <img src="https://source.unsplash.com/SYznSheH-bA/400x400" class="card-img2" alt="...">
                    <div class="card-body">

                    </div>
                </div>
            </div>
            <div class="col8">

                <div class="card card2 mt-3 card-izq" style="width: 8rem; ">
                    <h4 class="card-title">
                        {{$family["Hembra"][0]["Tercera generacion"][1]->name}}

                    </h4>
                    <img src="https://source.unsplash.com/SYznSheH-bA/400x400" class="card-img2" alt="...">
                    <div class="card-body">

                    </div>
                </div>
            </div>
            <div class="col8">

                <div class="card card2 mt-3 card-der" style="width: 8rem; ">
                    <h4 class="card-title">
                        {{$family["Hembra"][0]["Tercera generacion"][2]->name}}

                    </h4>
                    <img src="https://source.unsplash.com/SYznSheH-bA/400x400" class="card-img2" alt="...">
                    <div class="card-body">

                    </div>
                </div>
            </div>
            <div class="col8">

                <div class="card card2 mt-3  card-izq" style="width: 8rem; ">
                    <h4 class="card-title">
                        {{$family["Hembra"][0]["Tercera generacion"][3]->name}}

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

    <script type="text/javascript" src="{{ URL::asset('js/core/bootstrap.min.js') }}"></script>

</body>

</html>