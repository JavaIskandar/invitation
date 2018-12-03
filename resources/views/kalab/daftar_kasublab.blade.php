@extends('layouts.global')

@push('css')
<link href="{{ asset('css/fonts.css') }}" rel="stylesheet"/>
<link href="{{ asset('css/kasublab.css') }}" rel="stylesheet"/>
@endpush

@section('activity', 'Daftar Kasublab')

@section('content')

    <header class="header--padding">
        <h4 class="heading--padding">Daftar Kasublab Jurusan {{ Auth::user()->getJurusan()->nama }}</h4>
    </header>

    @if(Auth::user()->tambah_kasublab)
    <div id="fab" class="fab" @click="tambah">
        <i class="fa fa-plus fa-2x"></i>
    </div>
    @endif

    <div id="daftar-kasublab" class="row">
        <card-kasublab v-for="kasublab in daftarKasublab" :key="kasublab.id" :kasublab="kasublab"></card-kasublab>
    </div>
@endsection

@push('js')
<script>
    let daftarKasublab = new Vue({
        el: '#daftar-kasublab',
        data: {
            daftarKasublab: {!! $daftarKasublab !!},
            url_hapus: '{{ route('kasublab.hapus') }}',
            bisa_hapus: {{ Auth::user()->tambah_kasublab ? 'true' : 'false' }}
        },
        methods: {
            removeData(id) {
                this.daftarKasublab = this.daftarKasublab.map((item) => {
                    return item.id != id
                })
            }
        }
    })

    @if(Auth::user()->tambah_kasublab)
    let fab = new Vue({
        el: '#fab',
        methods: {
            tambah() {
                let root = document.createElement('div')
                let form = document.createElement('form-tambah-kasublab');
                root.appendChild(form)

                swal({
                    title: 'Tambah Kasublab',
                    buttons: false,
                    content: root
                })

                let formVue = new Vue({
                    el: root,
                    data: {
                        daftarProdi: {!! $daftarProdi !!},
                        url: '{{ route('kasublab.tambah') }}'
                    }
                })
            }
        }
    })
    @endif
</script>
@endpush