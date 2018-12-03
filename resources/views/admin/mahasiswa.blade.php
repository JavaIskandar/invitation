@extends('layouts.global')

@section('activity', 'Mahasiswa - Admin')

@section('title', 'Mahasiswa')

@push('css')
    <style>
        #cari {
            background-color: #fff;
            padding: 20px;
            -webkit-box-shadow: 0 3px 2px 1px rgba(0, 0, 0, 0.05);
            box-shadow: 0 3px 2px 1px rgba(0, 0, 0, 0.05);
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            margin-bottom: 20px;
        }

        #cari input[type="text"] {
            border: none;
            background: transparent;
            -webkit-box-flex: 2;
            -ms-flex-positive: 2;
            flex-grow: 2;
        }

        #cari button {
            background: transparent;
            border: none;
            padding: 0 10px 0;
            color: #333;
            cursor: pointer;
        }
    </style>
@endpush

@section('content')
    @if($errors->any())
        <div class="alert alert-warning">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="row">
        <div class="col-md-12">
            <div id="cari">
                <input type="text" value="{{ $q }}" placeholder="Cari Mahasiswa . . ." id="in"/>
                <button onclick="window.location = '{{ route('admin.mahasiswa', ['id' => null]) }}/' + encodeURIComponent($('#in').val())" id="buttonsearch">
                    <i class="fa fa-search"></i>
                </button>
            </div>
        </div>
    </div>
    <div class="row">
        @if(is_null($mhs))
        @else
            @foreach($mhs as $m)
                <div class="col-6">
                    <div class="card">
                        <div class="card-block">
                            <p>
                                {{ $m->id }}<br>
                                {{ $m->nama }}<br>
                                Jurusan {{ $m->getJurusan()->nama }}<br>
                                Prodi {{ $m->getProdi()->nama }}
                            </p>
                            <button class="btn btn-warning text-light" onclick="reset('{{ $m->id }}')">
                                Reset Password
                            </button>
                        </div>
                    </div>
                </div>
            @endforeach
        @endif
    </div>
    <div id="tes">
        {{ $mhs->links() }}
    </div>
    <form action="{{ route('admin.mahasiswa.reset') }}" method="post" id="reset" style="display: none">
        {{ csrf_field() }}
        {{ method_field('patch') }}
        <input type="hidden" name="id" id="reset_mahasiswa">
    </form>
@endsection

@push('js')
    <script type="text/javascript">
        $('#in').keypress(function(e){
            if(e.keyCode==13)
                $('#buttonsearch').click();
        });
        $('#tes').children('ul.pagination').children().addClass('btn btn-secondary');
        @if($errors->any())
        swal({
            icon: "error",
            text: "{!! implode('\n', $errors->all()) !!}",
            html: true
        });
        @endif
        @if(session()->has('message'))
        swal({
            icon: "success",
            title: "{{ session()->get('message') }}"
        });

        @endif
        function reset(id) {
            swal({
                title: "Anda yakin ingin mereset?",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            }).then((willReset) => {
                if (willReset) {
                    $('#reset_mahasiswa').val(id)
                    $('#reset').submit()
                }
            })
        }
    </script>
@endpush