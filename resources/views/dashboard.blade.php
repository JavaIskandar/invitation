@extends('layouts.global')

@push('css')
    <link href="{{ asset('css/fonts.css') }}" rel="stylesheet"/>
    <link href="{{ asset('css/kasublab.css') }}" rel="stylesheet"/>
@endpush

@section('content')
    {{--@foreach(\App\Mahasiswa::where('konfirmasi', true)->get() as $mhs)--}}
    {{--@if($mhs->getKalabKasublabYangBelumMenyetujui()->count() > 0)--}}
    {{--{{ $mhs->id }}--}}
    {{--@endif--}}
    {{--@if($mhs->getKalabKasublabYangMenolak()->count() > 0)--}}
    {{--{{ $mhs->id }}--}}
    {{--@endif--}}
    {{--@endforeach--}}

    <div class="row">
        <div class="col-md-12" style="padding: 30px">
            <br>
            <br>
            <div class="card sameheight-item">
                <div class="card-block">
                    <!-- Tab panes -->
                    <div class="tab-content tabs-bordered">
                        <div class="" id="">
                            <div class="card card-default" data-exclude="xs,sm">
                                <div class="card-block">
                                    <div class="tasks-block">
                                        <ul class="item-list striped">
                                            @foreach($listUndangan as $undangan)
                                                <li class="item">
                                                    <div class="item-row">
                                                        {{--<div class="item-col item-col-title no-overflow">--}}
                                                        <div class="col-sm-6">
                                                            <a class="date"
                                                               style="font-size: small">{{ $undangan->nama }} </a>
                                                            <h4 class="item-title no-wrap">{{ $undangan->tanggal }} </h4>
                                                            <p class="date">2/7 </p>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div class="pull-right" style="width: auto">
                                                                <p class="text-info" style="font-size: small"></p>
                                                                <a href="{{ route('user.undangan.edit', ['id' => $undangan->id]) }}" class="btn btn-primary btn-sm rounded">edit</a>
                                                                <a class="btn btn-primary btn-sm rounded">hapus</a>
                                                            </div>
                                                        </div>
                                                        {{--</div>--}}
                                                    </div>
                                                </li>
                                            @endforeach()
                                        </ul>
                                        <a href="{{ route('user.undangan.buat') }}">+ buat undangan</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
@push('js')
    <script>
        function tampilCatatan(catatan) {
            swal({
                icon: 'info',
                text: catatan
            });
        }
        @if(Session::has('message'))
        swal({
            icon: "success",
            title: 'Berhasil Mengajukan Surat Bebas Lab',
            text: "{{Session::get('message')}}"
        });
        @endif
    </script>
@endpush