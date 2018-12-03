@extends('layouts.global')

@section('activity', 'Pengaturan')

@section('content')
    
<div class="row">
    <div class="col col-sm-12 col-xs-12">
        <div class="card">
            <div class="card-block">
                <div class="title-block">
                    <h4 class="title">Ubah profil</h4>
                </div>

                @if(Session::has('success'))
                    <p class="alert alert-success">
                        {{ Session::get('success') }}
                    </p>
                @endif

                <form action="{{ route('ubah.profil') }}" method="post">

                    {{ csrf_field() }}

                    <div class="form-group">
                        <label class="control-label">NIP</label>
                        <input type="number" name="nip" class="form-control boxed" value="{{ Auth::user()->id }}" disabled/>
                        @if($errors->has('nip'))
                        <p class="alert alert-danger">
                            {{ $errors->first('nip') }}
                        </p>
                        @endif
                    </div>
                    
                    <div class="form-group">
                        <label class="control-label">Nama</label>
                        <input type="text" name="nama" class="form-control boxed" value="{{ Auth::user()->nama }}" required/>
                        @if($errors->has('nama'))
                        <p class="alert alert-danger">
                            {{ $errors-first('nama') }}
                        </p>
                        @endif
                    </div>

                    {{--
                      -- Menampilkan opsi mengganti program studi untuk
                      -- kalab maupun kasublab
                      --}}
                    @if(Auth::guard('web')->check() && Auth::guard('web')->user()->isKasublab() || Auth::guard('web')->user()->isKalab())
                    <div class="form-group">
                        <label for="prodi" class="control-label">Prodi</label>
                        <select name="prodi" class="form-control boxed">
                            <option value="{{ Auth::user()->getProdi()->id }}">{{ Auth::user()->getProdi()->nama }}</option>
                            @foreach (Auth::user()->getJurusan()->getRelasiProdi()->where('id', '!=', Auth::user()->getProdi()->id)->get() as $prodi)
                                <option value="{{ $prodi->id }}">{{ $prodi->nama }}</option>
                            @endforeach
                        </select>
                    </div>
                    @endif

                    <button type="submit" class="btn btn-primary">Simpan</button>

                </form>
            </div>
        </div>
    </div>

    <div class="col col-sm-12 col-xs-12">
        <div class="card">
            <div class="card-block">
                <div class="title-block">
                    <h4 class="title">Ubah kata sandi</h4>
                </div>

                @if(Session::has('success_password'))
                    <p class="alert alert-success">
                        {{ Session::get('success_password') }}
                    </p>
                @endif
                <form action="{{ route('ubah.kata.sandi') }}" method="post">

                    {{ csrf_field() }}

                    <div class="form-group">
                        <label class="control-label">Kata sandi saat ini</label>
                        <input type="password" class="form-control boxed" name="passlama" required/>
                        @if($errors->has('passlama'))
                            <p class="alert alert-danger">
                                {{ $errors->first('passlama') }}
                            </p>
                        @endif
                    </div>

                    <div class="form-group">
                        <label class="control-label">Kata sandi baru</label>
                        <input type="password" class="form-control boxed" name="passbaru" required/>
                        @if($errors->has('passbaru'))
                            <p class="alert alert-danger">
                                {{ $errors->first('passbaru') }}
                            </p>
                        @endif
                    </div>
                    
                    <div class="form-group">
                        <label class="control-label">Konfirmasi kata sandi baru</label>
                        <input type="password" class="form-control boxed" name="passbaru_confirmation" required/>
                        @if($errors->has('passbaru_confirmation'))
                            <p class="alert alert-danger">
                                {{ $errors->first('passbaru_confirmation') }}
                            </p>
                        @endif
                    </div>

                    <button type="submit" class="btn btn-primary">Ubah</button>

                </form>
            </div>
        </div>
    </div>
</div>

@endsection