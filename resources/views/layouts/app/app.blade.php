<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Flybi Sistemas') }}</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <!-- Fonts do Google fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Mukta&display=swap" rel="stylesheet">

    <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
    <!-- AdminLTE App -->

    <script src="{{ asset('js/app.js') }}"></script>

</head>

<body class="">

    <style>
        body{
            font-family: 'Mukta', sans-serif;
        }
    </style>

    <div id="body-bg">
        
    </div>

    <div id="page-wrapper">
        @include('app.home.components.preloader')
        @include('app.home.header')
        <main>
            @yield('content')
        </main>

        @yield('footer')
    </div>
</body>
    <script src="{{asset('js/breakpoints.min.js')}}"></script>
    <script src="{{asset('js/browser.min.js')}}"></script>
    <script src="{{asset('js/jquery.dropotron.min.js')}}"></script>
    <script src="{{asset('js/util.js')}}"></script>
    <script src="{{asset('js/main.js')}}"></script>
    
    <script>
        bg = document.querySelector('.bannerZoom>.bannerBg>img')
        // se bg diferente de null
        if(bg != null){
            bg.style.transform = 'scale(1.3)';
            setInterval(function () {
                if(bg.style.transform == 'scale(1.3)'){
                    bg.style.transform = 'scale(1)';
                }else{
                    bg.style.transform = 'scale(1.3)';
                }
            }, 10000);
        }
        
        window.onload = function(){
            let elemento = document.querySelectorAll('.hconteudo')[0];
            window.onscroll = function () {
                 navBarVisible(elemento);
                 moveBlockVisible();
            }
        }
    
        function navBarVisible(elemento){
            if (window.pageYOffset > 25 && window.pageYOffset < 150) {
                elemento.style.top = '-5px';
                elemento.querySelectorAll('.hlinks>nav>ul>li>a').forEach((elem) => {
                    elem.classList.remove('navbar-open')
                    elem.classList.add('navbar-close')
                });
            }
            else {
                elemento.style.top = '0px';
                elemento.style.backgroundColor = 'transparent';
            }
            if(window.pageYOffset > 150) {
                elemento.style.position = 'fixed';
                elemento.style.top = '0px';
                elemento.style.backgroundColor = '#f7f7f7'; 
                elemento.querySelectorAll('.hlinks>nav>ul>li>a').forEach((elem) => {
                elem.classList.add('navbar-open')
                elem.classList.remove('navbar-close')
                })
            }
        }
    
        function moveBlockVisible(){
            blocks = document.querySelectorAll('.bloco');
            for(let i = 0; i < blocks.length; i++){
                if(blocks[i].getBoundingClientRect().top < window.innerHeight){
                    blocks[i].style.opacity = '1';
                    blocks[i].style.left = '0px';
                    blocks[i].style.top = '0px';
                    blocks[i].style.right = '0px';
                }
            }
        }
    </script>
</html>


