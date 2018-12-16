@extends('layouts.global')

@section('activity', 'Edit')

@section('content')
    <div class="title card-title">I N V I T A T I O N</div>
    @if($errors->any())
        <div class="alert alert-warning">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
    @endif
    @if(Session::get('error')!==null)
        <div class="alert alert-warning">
            <p>{{Session::get('error')}}</p>
        </div>
    @endif
    <div class="row sameheight-container">
        <div class="col-lg-6">
            <div class="card card-block">
                <div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Deskripsi Acara</label>
                    </div>
                    <div class="form-group">
                        <label for="nama-agenda">ID Acara</label>
                        <span id="nama-agenda">{{ $undangan->id}}
                        </span>
                    </div>
                    <div class="form-group">
                        <label for="nama-agenda">Nama Acara</label>
                        <span id="nama-agenda">{{ $undangan->nama_agenda}}
                        </span>
                    </div>
                    <div class="form-group">
                        <label for="nama-pengirim">Nama_Pengirim</label>
                        <span id="nama-pengirim">{{  $undangan->nama_pengirim }}
                        </span>
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <span id="alamat">{{ $undangan->alamat }}</span>
                    </div>
                    <div class="form-group">
                        <label for="tanggal">Tanggal</label>
                        <span id="tanggal">{{ $undangan->tanggal }}"</span>
                    </div>
                    <div class="form-group">
                        <label for="jam">Pukul</label>
                        <span id="jam">{{ $undangan->jam }}</span>
                    </div>
                    <div class="form-group">
                        <label for="keterangan">Keterangan</label>
                        <p id="keterangan">{{ $undangan->keterangan }}</p>
                    </div>
                    <input type="number" class="form-control" id="lat" placeholder="" name="lat"
                           value="" hidden>
                    <input type="number" class="form-control" id="lng" placeholder="" name="lng"
                           value="" hidden>
                    <div class="form-group">
                        <a href="{{ route('tamu.konfirmasi', ['id' => encrypt($tamu->id)]) }}" class="btn btn-primary">konfirmasi
                            dan unduh undangan</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            @if($undangan->lat != null)
                <div class="col-lg-12" id="map" style="height: 300px;"></div>
            @endif
        </div>
    </div>
@endsection

@push('js')
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCiDdGyp6n2hKHPECuB6JZIT-8dVHCpwI0&language=id&region=ID"></script>
    <script>

        var defaultCenter = {
            lat: {{ !is_null($undangan->lat) ? $undangan->lat : '-8.251889' }},
            lng: {{ !is_null($undangan->lat) ? $undangan->lng : '115.076818' }}
        };

        function initMap() {

            var map = new google.maps.Map(document.getElementById('map'), {
                zoom: 10,
                center: defaultCenter
            });

            var marker = new google.maps.Marker({
                position: defaultCenter,
                map: map,
                title: 'Click to zoom',
                draggable: false
            });

            var infowindow = new google.maps.InfoWindow({
                content: '<h4>Tempat Acara</h4>'
            });

            infowindow.open(map, marker);
        }

        function handleEvent(event) {
            document.getElementById('lat').value = event.latLng.lat();
            document.getElementById('lng').value = event.latLng.lng();
        }


        @if(Session::has('success'))
        swal({
            icon: "success",
            title: "{{Session::get('success')}}"
        });
        @endif

        $(function () {
            initMap();
        })
    </script>
@endpush