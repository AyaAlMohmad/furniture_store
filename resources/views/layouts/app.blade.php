<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">


<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <title>Maison Ciel</title>
    <meta content="Admin Dashboard" name="description" />
    <meta content="ThemeDesign" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <link rel="shortcut icon" href="{{ asset('dashboard/assets/images/photo_2024-01-18_11-51-02.jpg') }}">

    <link href="{{ asset('dashboard/assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('dashboard/assets/css/icons.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('dashboard/assets/css/style.css') }}" rel="stylesheet" type="text/css">

</head>
{{-- <body> --}}

<body class="fixed-left">

    <!-- Loader -->
    <div id="preloader">
        <div id="status">
            <div class="spinner">
                <div class="rect1"></div>
                <div class="rect2"></div>
                <div class="rect3"></div>
                <div class="rect4"></div>
                <div class="rect5"></div>
            </div>
        </div>
    </div>

        <div class="home-btn d-none d-sm-block">
            <a href="index.html" class="text-dark"><i class="mdi mdi-home h1"></i></a>
        </div>

        <div class="account-pages">



    <main class="py-4">
        @yield('content')
    </main>
</div>



<!-- jQuery  -->
<script src="{{ asset('dashboard/assets/js/jquery.min.js')}}"></script>
<script src="{{ asset('dashboard/assets/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{ asset('dashboard/assets/js/modernizr.min.js')}}"></script>
<script src="{{ asset('dashboard/assets/js/detect.js')}}"></script>
<script src="{{ asset('dashboard/assets/js/fastclick.js')}}"></script>
<script src="{{ asset('dashboard/assets/js/jquery.slimscroll.js')}}"></script>
<script src="{{ asset('dashboard/assets/js/jquery.blockUI.js')}}"></script>
<script src="{{ asset('dashboard/assets/js/waves.js')}}"></script>
<script src="{{ asset('dashboard/assets/js/jquery.nicescroll.js')}}"></script>
<script src="{{ asset('dashboard/assets/js/jquery.scrollTo.min.js')}}"></script>

<!-- App js -->
<script src="{{ asset('dashboard/assets/js/app.js')}}"></script>

</body>
</html>