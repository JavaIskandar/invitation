<li @if(Route::currentRouteName()=='kasublab.daftar.mahasiswa' ) class="active" @endif>
    <a href="{{ route('kasublab.daftar.mahasiswa') }}">
        <i class="fa fa-graduation-cap"></i>
        Daftar Mahasiswa
    </a>
</li>
@if(Auth::user()->isKalab())
<li @if(Route::currentRouteName()=='kasublab.daftar.kasublab' ) class="active" @endif>
    <a href="{{ route('kasublab.daftar.kasublab') }}">
        <i class="fa fa-users"></i>
        Daftar Kasublab
    </a>
</li>
@endif