<!doctype html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title> Validasi surat </title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}"/>

    <!-- Place favicon.ico in the root directory -->
    <!-- Theme initialization -->
    <link rel="stylesheet" href="{{ asset('modular/css/vendor.css') }}">
    <link rel="stylesheet" href="{{ asset('modular/css/app-green.css') }}">
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
    <style>
        .app {
            padding-left: 0;
        }

        .header {
            left: 0;
        }
    </style>
</head>
<body>
<div class="main-wrapper">
    <div class="app">
        <br>
        <div class="row">
            <div class="col-md-4 col-sm-1"></div>
            <div class="col-md-4 col-sm-10">
                <div class="card">
                    <div class="card-header">
                        <div class="header-block">
                            <h1 style="text-align: center">VALIDASI SURAT</h1>
                        </div>
                    </div>
                    <div class="card-header">
                        <div class="header-block">
                            <h3 class="title">Surat ini dimiliki oleh</h3>
                        </div>
                    </div>
                    <div class="card-block">
                        <div class="row">
                            <div class="col-md-4">
                                <label>NIM</label>
                            </div>
                            <div class="col-md-8">
                                {{ $mhs->id }}
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <label>Nama</label>
                            </div>
                            <div class="col-md-8">
                                {{ $mhs->nama }}
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <label>Prodi</label>
                            </div>
                            <div class="col-md-8">
                                {{ $mhs->getProdi()->nama }}
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <label>Jurusan</label>
                            </div>
                            <div class="col-md-8">
                                {{ $mhs->getJurusan()->nama }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-1"></div>
        </div>
    </div>
</div>
</body>
<script src="{{ asset('modular/js/vendor.js') }}"></script>
<script src="{{ asset('modular/js/app.js') }}"></script>
<script src="{{ asset('js/app.js') }}"></script>
</html>