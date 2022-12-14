<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('pagina')</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/toastr/toastr.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/select2-bootstrap4-theme/select2-bootstrap4.css') }}">
    <link href="{{ asset('css/adminlte.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/adminlte.min.css.map') }}" rel="stylesheet">
    <link href="{{ asset('css/ijaboCropTool.min.css') }}" rel="stylesheet">

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
</head>

<body class="@yield('body')">
    @if(count($errors) > 0)
        <script>
            @foreach($errors->all() as $error)
                window.onload = function () {
                    toastr.error('{{ $error }}');
                };
            @endforeach
        </script>
    @endif

    
    <div class="wrapper">
        @if(Auth::check())
        @include('layouts.admin.header')

        @include('layouts.admin.sidebar')

        @yield('content')

        @include('layouts.admin.footer')
        @else
        @yield('content')
        @endif
    </div>
</body>
<script src="{{ asset('plugins/jquery/jquery.mask.min.js') }}"></script>
<script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- AdminLTE App -->

<script src="{{ asset('plugins/select2/js/select2.full.min.js') }}"></script>
<script src="{{ asset('plugins/sweetalert2/sweetalert2.min.js') }}"></script>
<script src="{{ asset('plugins/toastr/toastr.min.js') }}"></script>
<script src="{{ asset('js/adminlte.min.js') }}"></script>
<!-- <script src="{{ asset('js/forms.js') }}"></script> -->
<script src="{{ asset('js/ijaboCropTool.min.js') }}"></script>


<script src="{{ asset('js/app.js') }}" defer ></script>

</html>