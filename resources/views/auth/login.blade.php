@extends('layouts.blank')

@section('title', 'Login Kalab & Kasublab')

@section('titleinfo', 'Login Kalab & Kasublab')

@section('content')
    <form id="login-form" action="{{ route('user.login.proses') }}" method="POST">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="username">Email</label>
            <input type="email" class="form-control underlined" name="email" id="username" placeholder="Masukkan email" required> </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control underlined" name="password" id="password" placeholder="Masukkan password" required> </div>
        <div class="form-group">
            <label for="remember">
                <input class="checkbox" name="remember" id="remember" type="checkbox">
                <span>Ingat</span>
            </label>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-block btn-primary">Login</button>
        </div>
    </form>
@endsection

@push('js')
    @if($errors->any())
        <script>
            swal({
                icon: "error",
                title: "Username atau password salah!"
            });
        </script>
    @endif
@endpush