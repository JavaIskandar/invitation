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
    <style>
    </style>
</head>
<body>
    <div id="hidden">
    <div id="material">
        <div></div>
        <div></div>
        <div></div>
    </div>
    <div class="jumbotron">
        <h1>I N V I T A T I O N</h1>
        <ul class="list-group">
            <li class="list-group-item">
                <a href="{{ route('login') }}">
                    <h3>LOGIN</h3>
                    <p>Masuk dan buat undangan acara</p>
                </a>
            </li>
            <li class="list-group-item">
                <a href="{{ route('user.sign-up') }}">
                    <h3>SIGN UP</h3>
                    <p>Buat akun untuk membuat undangan acara</p>
                </a>
            </li>
        </ul>
    </div>
    </div>
    <script src="{{ asset('modular/js/vendor.js') }}"></script>
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>