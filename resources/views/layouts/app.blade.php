<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <!-- Compiled and minified Bootstrap CSS -->
    <script src="{{ asset('js/core/jquery.min.js') }}" ></script>
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('icons/css/all.min.css') }}">

        <link href="{{ asset('css/main.css') }}" rel="stylesheet">
    @stack('styles')
    <title>Document</title>
   
    <title>Laravel - @yield('title')</title>
</head>

<body>
        <header>
                <input type="checkbox" id="btn-menu" />
                <label for="btn-menu"><i class="fa fa-bars" style="color: #B7B9C4"></i></label>
                <nav class="main-menu">
                    <ul>
                        <li> <a href="#" class= "{{ (request()->is('/')) ? 'active' : '' }}"> Inicio</a></li>
                        <li class= "{{ (request()->is('Ejemplares/American Bully')) ? 'active' : '' }}"><a href="{{url('/Ejemplares/American Bully') }}">American Bully</i></a>
        
                        </li>
                        <li class= "{{ (request()->is('Ejemplares/Bulldog Francés')) ? 'active' : '' }}"><a  href="{{ url('/Ejemplares/Bulldog Francés') }}">Bulldog Francés</a>
        
                        </li>
                        <li class= "{{ (request()->is('Ejemplares/Bulldog Inglés')) ? 'active' : '' }}">
                            <a href="{{ url('/Ejemplares/Bulldog Inglés') }}">Bulldog Inglés</a></li>
                        <li>
                            <a href="href="{{ url('/Ejemplares/') }}"">Web principal</a></li>
                    </ul>
                </nav>
            </header>
    @yield('content')

    @include('public.modal')


    <footer id="sticky-footer" class="py-4 bg-dark text-white-50">
        <div class="container text-center">
            <small>&copy; 2019 DERECHOS RESERVADOS. REALIZADO POR <a class="link"
                    href="https://club.colorfussionkc.com/">COLOR FUSSION</a></small>
        </div>
    </footer>
    


    <script src="{{ URL::asset('js/core/popper.min.js') }}"></script>
    <script src="{{ URL::asset('js/core/bootstrap.min.js') }}"></script>

    
</body>

</html>