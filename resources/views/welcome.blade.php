<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Surat Bebas Laboratorium</title>
    <link rel="stylesheet" href="{{ asset('modular/css/vendor.css') }}">
    <link rel="stylesheet" href="{{ asset('css/landing.css') }}"/>
    <link rel="stylesheet" href="{{ asset('css/fonts.css') }}"/>
    <!-- Bootstrap CSS -->
    <link href="{{ asset('assets/css/bootstrap.min.css')}}" rel="stylesheet">
    <!-- Fonts Icon CSS -->
    <link href="{{ asset ('assets/css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{ asset ('assets/css/et-line.css')}}" rel="stylesheet">
    <link href="{{asset ('assets/css/ionicons.min.css')}}" rel="stylesheet">
    <!-- Carousel CSS -->
    <link href="{{asset ('assets/css/owl.carousel.min.css')}}" rel="stylesheet">
    <link href="{{asset ('assets/css/owl.theme.default.min.css')}}" rel="stylesheet">
    <!-- Animate CSS -->
    <link rel="stylesheet" href="{{asset ('assets/css/animate.min.css')}}">
    <!-- Custom styles for this template -->
    <link href="{{asset ('assets/css/main.css')}}" rel="stylesheet">
    <style>
    </style>
</head>
<body>

<!--header start here -->
<header class="header navbar fixed-top navbar-expand-md">
    <div class="container">
        <a class="navbar-brand logo" href="#">
            <img src="images/logoInvitation.png" alt="Evento"/>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#headernav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="lnr lnr-text-align-right"></span>
        </button>
        <div class="collapse navbar-collapse flex-sm-row-reverse" id="headernav">
            <ul class=" nav navbar-nav menu">
                <li class="nav-item">
                    <a class="nav-link active" href="{{ route('login') }}">Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="{{ route('user.sign-up') }}">Sign Up</a>
                </li>
            </ul>
        </div>
    </div>
</header>
<!--header end here-->

<!--cover section slider -->


<!--cover section slider end -->
{{--<div class="cover_slider owl-carousel owl-theme">--}}
{{--<div class="cover_item" style="background: url('assets/img/bg/slider.png');">--}}
    {{--<ul class="list-group">--}}
        {{--<li class="list-group-item">--}}
            {{--<a href="{{ route('login') }}">--}}
                {{--<h3>LOGIN</h3>--}}
                {{--<p>Masuk dan buat undangan acara</p>--}}
            {{--</a>--}}
        {{--</li>--}}
        {{--<li class="list-group-item">--}}
            {{--<a href="{{ route('user.sign-up') }}">--}}
                {{--<h3>SIGN UP</h3>--}}
                {{--<p>Buat akun untuk membuat undangan acara</p>--}}
            {{--</a>--}}
        {{--</li>--}}
    {{--</ul>--}}
<section id="home" class="home-cover">
    <div class="cover_slider owl-carousel owl-theme">
        <div class="cover_item" style="background: url('assets/img/bg/slider.png');">
            <div class="slider_content">
                <div class="slider-content-inner">
                    <div class="container">
                        <div class="slider-content-center">
                            <img src="images/home.png" />
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

</section>

<script src="{{ asset('modular/js/vendor.js') }}"></script>
<script src="{{ asset('js/app.js') }}"></script>
</body>
</html>