@extends('layouts.global')

@section('activity', 'Edit')

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
    @if(Session::get('error')!==null)
        <div class="alert alert-warning">
            <p>{{Session::get('error')}}</p>
        </div>
    @endif
    <div class="row sameheight-container">
        <div class="col-lg-6">
            <div class="card card-block">
                <form role="form"
                      action="{{ !$edit ? route('user.undangan.buat.proses') : route('user.undangan.edit.deskripsi', ['id' => $undangan->id]) }}"
                      method="post">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label for="exampleInputEmail1">Deskripsi Acara</label>
                    </div>
                    <div class="form-group">
                        <label for="nama-agenda">Nama Acara</label>
                        <input type="text" class="form-control" id="nama-agenda" placeholder=""
                               value="{{ $edit ? $undangan->nama_agenda : '' }}"
                               name="nama_agenda">
                    </div>
                    <div class="form-group">
                        <label for="nama-pengirim">Nama_Pengirim</label>
                        <input type="text" class="form-control" id="nama-pengirim" placeholder="" name="nama_pengirim"
                               value="{{ $edit ? $undangan->nama_pengirim : '' }}">
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <input type="text" class="form-control" id="alamat" placeholder="" name="alamat"
                               value="{{ $edit ? $undangan->alamat : '' }}">
                    </div>
                    <div class="form-group">
                        <label for="tanggal">Tanggal</label>
                        <input type="date" class="form-control" id="tanggal" placeholder="" name="tanggal"
                               value="{{ $edit ? $undangan->tanggal : '' }}">
                    </div>
                    <div class="form-group">
                        <label for="jam">Pukul</label>
                        <input type="time" class="form-control" id="jam" placeholder="" name="jam"
                               value="{{ $edit ? $undangan->jam : '' }}">
                    </div>
                    <div class="form-group">
                        <label for="keterangan">Keterangan</label>
                        <textarea class="form-control" id="keterangan" placeholder=""
                                  name="keterangan">{{ $edit ? $undangan->keterangan : '' }}</textarea>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                    @if($edit)
                </form>
                @endif
            </div>
        </div>
        <div class="col-lg-6">
            @if ($edit)
                <div class="card card-block">
                    <form role="form" action="" method="post" enctype="multipart/form-data">
                        {{csrf_field()}}
                        <div class="form-group">
                            <label for="exampleInputPassword1">Tamu Undangan</label>
                        </div>
                        <div class="form-group">
                            @foreach($listTamu as $tamu)
                                <ul class="list-group">
                                    <li>{{ $tamu->email }}</li>
                                </ul>
                            @endforeach
                        </div>
                        <input id="inputFile" type="file" name="berkas" style="display: none" class="dz-message-block">
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            @endif
            <div class="card card-block">
                @if($edit)
                    <form role="form" action="" method="post">
                        {{csrf_field()}}
                        @endif
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tamu Undangan</label>
                        </div>
                        <p class="alert alert-info"> masukkan email-email tamu yang dituju dengan pemisah enter untuk
                            setiap
                            email tamu undangan</p>
                        <div class="form-group">
                            <label for="password">Email</label>
                            <textarea rows="4" class="form-control" id="nama" placeholder=""
                                      name="email_tamu"></textarea>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Kirim Undangan</button>
                        </div>
                    </form>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script>
        @if(Session::has('success'))
        swal({
            icon: "success",
            title: "{{Session::get('success')}}"
        });
        @endif
    </script>
@endpush