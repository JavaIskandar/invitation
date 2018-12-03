@extends('layouts.blank')

@section('activity', 'ajukan pemohonan')

@section('titleinfo', 'Ajukan Surat')

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
    <form role="form" action="{{route('mahasiswa.ajukan.proses')}}" method="post" enctype="multipart/form-data">
        {{csrf_field()}}
        {{method_field('post')}}
        <div class="form-group">
            <label for="exampleInputEmail1">NIM</label>
            <input type="number" class="form-control" id="nim" placeholder="" name="nim"> </div>
        <br>
        <br>
        <div class="form-group">
            <button class="col-12 btn btn-primary" type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>

@endsection

@push('js')
    <script>
        {{--function upload() {--}}
            {{--document.getElementById("inputFile").click();--}}
        {{--}--}}
        {{--$(document).ready(function(){--}}
            {{--$('input[type="file"]').change(function(e){--}}
                {{--var fileName = e.target.files[0].name;--}}
                {{--document.getElementById("namaFile").innerHTML = fileName;--}}
            {{--});--}}
        {{--});--}}

        {{--$('#jurusan').on('change', function(e){--}}
            {{--console.log(e);--}}
            {{--var jurusan_id = e.target.value;--}}

            {{--$.get('{{ url('mahasiswa/etc/getprodi') }}/' + jurusan_id, function (data) {--}}
                {{--console.log(data);--}}
                {{--$('#prodi').empty();--}}
                {{--$.each(data, function (index, subCatObj) {--}}
                    {{--$('#prodi').append('<option value="' + subCatObj.id + '">' + subCatObj.nama + '</option>');--}}
                {{--});--}}
            {{--});--}}
        {{--});--}}
    </script>
@endpush
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