@extends('layouts.blank')

@section('title', 'Login Kalab & Kasublab')

@section('titleinfo', 'Login Kalab & Kasublab')

@section('content')
    <form id="login-form" action="{{ route('user.sign-up.proses') }}" method="POST">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="username">Nama Lengkap</label>
            <input type="text" class="form-control underlined" name="nama" id="username" placeholder="nama" required>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control underlined" name="email" id="email" placeholder="nama" required>
        </div>
        <div class="form-group">
            <label for="jenis-kelamin">Jenis Kelamin</label>
            <select id="jenis-kelamin" class="form-control" name="jenis_kelamin">
                <option value="Laki-Laki">Laki-Laki</option>
                <option value="Perempuan">Perempuan</option>
            </select>
        </div>
        <div class="form-group">
            <label for="tanggal-lahir">Tanggal Lahir</label>
            <input type="date" class="form-control underlined" name="tanggal_lahir" id="tanggal-lahir" required>
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control underlined" name="password" id="password" placeholder="Masukkan password" required></div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control underlined" name="confirm_password" id="password" placeholder="Masukkan password" required></div>
        <div class="form-group">
            <label for="remember">
                <input class="checkbox" name="remember" id="remember" type="checkbox">
                <span>Ingat</span>
            </label>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-block btn-primary">Sign Up</button>
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