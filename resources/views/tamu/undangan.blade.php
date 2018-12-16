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
            </div>
        </div>
    </div>
    @if(!$verifikasi)
        <div class="col-lg-6">
            <img style="height: 150px; margin-left: 20px" src="{{ asset('images/qrCode/'.$tamu->id.'.png') }}"/>
        </div>
    @endif
</div>