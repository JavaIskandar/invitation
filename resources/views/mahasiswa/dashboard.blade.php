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
            @if(Auth::guard('mhs')->user()->konfirmasi)
                <div class="card card-info">
                    <div class="card-block">
                        <h4 class=""><em class="fa fa-check-circle-o"></em> Pengajuan surat telah disetujui</h4>
                        <br>
                        <form role="form" action="{{ route('mahasiswa.unduh') }}" method="get" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <button class="btn btn-primary">DOWNLOAD SURAT</button>
                        </form>
                    </div>
                </div>
            @elseif($jumlahMenolak>0)
                <div class="card card-danger">
                    <div class="card-header">
                        <div class="card-block">
                            <h4 class="text-light"><em class="fa  fa-warning"></em> Pengajuan surat tidak disetujui</h4>
                        </div>
                    </div>
                    <div class="card-block">
                        <p>Mohon segera hubungi kalab atau kasublab yang bersangkutan</p>
                    </div>
                </div>
            @else
                <div class="alert alert-warning">
                    <div class="card-block">
                        <h4 class="text-light"><em class="fa  fa-warning"></em> Pengajuan surat belum
                            disetujui</h4>
                    </div>
                </div>
            @endif
            <br>
                <br>
                <ul class="nav ui-tab" style="background-color: transparent">
                    <li href="#menyetujui" class="btn-dark active" data-target="#menyetujui" data-toggle="tab">
                        <a  class="text-light" aria-controls="home" role="tab">Yang menyetujui  : {{$jumlahMenyetujui}}</a>
                    </li>
                    <li href="#belumSetuju" class="btn-dark" data-target="#belumSetuju" data-toggle="tab">
                        <a class="text-light" aria-controls="profile" role="tab">Yang belum menanggapi  : {{$jumlahBelum}}</a>
                    </li>
                    <li href="" class="btn-dark" data-target="#menolak" aria-controls="messages" data-toggle="tab">
                        <a class="text-light" role="tab">Yang belum menyetujui  : {{$jumlahMenolak}}</a>
                    </li>
                </ul>
                <div class="card sameheight-item">
                    <div class="card-block">
                        <!-- Tab panes -->
                        <div class="tab-content tabs-bordered">
                            <div class="tab-pane fade in active show" id="menyetujui">
                                <div class="card card-default" data-exclude="xs,sm">
                                    <div class="card-block">
                                        <div class="tasks-block">
                                            <ul class="item-list striped">

                                                @foreach($kasublabMenyetujui as $kasublab)
                                                    <li class="item">
                                                        <div class="item-row">
                                                            {{--<div class="item-col item-col-title no-overflow">--}}
                                                                <div class="col-sm-6">
                                                                    <a class="date"
                                                                       style="font-size: small">{{$kasublab->pivot->created_at->diffForHumans()}} </a>
                                                                    <h4 class="item-title no-wrap">{{ $kasublab->nama}} </h4>
                                                                    <p class="date">{{$kasublab->id}} </p>
                                                                </div>
                                                            <div class="col-sm-6">
                                                                <p class="text-info date pull-right" style="font-size: small">{{$kasublab->role}}</p>
                                                            </div>
                                                            {{--</div>--}}
                                                        </div>
                                                    </li>
                                                @endforeach()
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="menolak">
                                <div class="card card-default" data-exclude="xs,sm">
                                    <div class="card-block">
                                        <div class="tasks-block">
                                            <ul class="item-list striped">
                                                @foreach($kasublabMenolak as $kasublab)
                                                    <li class="item">
                                                        <div class="item-row">
                                                            {{--<div class="item-col item-col-title no-overflow">--}}
                                                                <div class="col-sm-6">
                                                                    <a class="date"
                                                                       style="font-size: small">{{$kasublab->pivot->created_at->diffForHumans()}} </a>
                                                                    <h4 class="item-title no-wrap">{{$kasublab->nama}} </h4>
                                                                    <p class="date">{{$kasublab->id}} </p>
                                                                </div>
                                                                <div class="col-sm-6">
                                                                    <div class="pull-right" style="width: auto">
                                                                        <p class="text-info" style="font-size: small">{{$kasublab->role}}</p>
                                                                        <button class="btn btn-primary btn-sm rounded"
                                                                                onclick="tampilCatatan('{{$kasublab->pivot->catatan}}')">Lihat
                                                                            Catatan
                                                                        </button>
                                                                    </div>
                                                                </div>
                                                            {{--</div>--}}
                                                        </div>
                                                    </li>
                                                @endforeach()
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="belumSetuju">
                                <div class="card sameheight-item card-default" data-exclude="xs,sm">
                                    <div class="card-block">
                                        <div class="tasks-block">
                                            <ul class="item-list striped">
                                                @foreach($kasublabBelumMenyetujui as $kasublab)
                                                    <li class="item">
                                                        <div class="item-row">
                                                            <div class="col-sm-6">
                                                                <div>
                                                                    <h4 class="item-title no-wrap">{{$kasublab->nama}} </h4>
                                                                    <p class="date">{{$kasublab->id}} </p>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <p class="text-info pull-right" style="font-size: small">{{$kasublab->role}}</p>
                                                            </div>
                                                        </div>
                                                    </li>
                                                @endforeach()
                                            </ul>
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