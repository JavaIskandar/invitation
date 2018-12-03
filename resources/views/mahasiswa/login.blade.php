@extends('layouts/blank')

@section('title', 'login')

@section('titleinfo', 'Login')

@section('content')
    <form id="login-form" action="{{ route('mahasiswa.login.proses') }}" method="POST">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="username">NIM</label>
            <input type="number" class="form-control underlined" name="id" id="username" placeholder="" required> </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control underlined" name="password" id="password" placeholder="" required> </div>
        <div class="form-group">
            <label for="remember">
                <input class="checkbox" id="remember" type="checkbox" name="remember">
                <span>Ingat Saya</span>
            </label>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-block btn-primary">Login</button>
        </div>
        <div class="form-group">
            <p class="text-muted text-center">Belum mengajukan surat bebas lab?
                <a href="{{ route('mahasiswa.ajukan') }}">Ajukan Surat!</a>
            </p>
        </div>
    </form>
@endsection

@push('js')
    @if(Session::has('message'))
        <script>
            swal({
                icon: "error",
                title: "{{ Session::get('message') }}"
            });
        </script>
    @endif
@endpush