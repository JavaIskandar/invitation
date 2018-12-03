@extends('layouts.blank')

@section('activity', 'ajukan pemohonan')

@section('titleinfo', 'Konfirmasi')

@section('content')
    @if($errors->any())
        <div class="alert alert-warning">
            <ul>
                @foreach($errors->all() as $error)
                    <li >{{$error}}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form role="form" action="{{route('mahasiswa.konfirmasi')}}" method="post" enctype="multipart/form-data">
        {{csrf_field()}}
        {{method_field('post')}}
        <div class="form-group">
            <label >Nama Lengkap</label>
            <p class="">{{ $mhs->nama }}</p> </div>
        <div class="form-group">
            <label>NIM</label>
            <p class="" id="nim">{{ $mhs->id }}</p>
        </div>
        <div class="form-group">
            <label>Prodi</label>
            <p>{{ $prodi }}</p>
        </div>
        <br>
        <input type="hidden" value="{{ $mhs->id }}" name="nim"/>
        <div class="form-group">
            <button class="col-12 btn btn-primary" type="submit" class="btn btn-primary">Ajukan</button>
        </div>
    </form>
@endsection