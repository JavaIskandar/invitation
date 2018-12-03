<li @if(Route::currentRouteName() == 'admin.kalabkasublab') class="active" @endif>
    <a href="{{ route('admin.kalabkasublab') }}">
        <i class="fa fa-users"></i>
        Kalab & Kasublab
    </a>
</li>
<li @if(Route::currentRouteName() == 'admin.mahasiswa') class="active" @endif>
    <a href="{{ route('admin.mahasiswa', ['id' => '[]']) }}">
        <i class="fa fa-graduation-cap"></i>
        Mahasiswa
    </a>
</li>
<li @if(Route::currentRouteName() == 'admin.etc') class="active" @endif>
    <a href="{{ route('admin.etc') }}">
        <i class="fa fa-gears"></i>
        Lain-lain
    </a>
</li>