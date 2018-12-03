<li @if(Route::currentRouteName() == 'mahasiswa.dashboard') class="active" @endif>
    <a href="{{ route('mahasiswa.dashboard') }}">
        <i class="fa fa-home"></i>
        Dashboard
    </a>
</li>
<li @if(Route::currentRouteName() == 'mahasiswa.edit') class="active" @endif>
    <a href="{{ route('mahasiswa.edit') }}">
        <i class="fa fa-edit"></i>
        Edit Data Diri
    </a>
</li>