<?php

Route::get('/', function () {
    return view('welcome');
})->name('landing');

// Authentication Routes...
Route::namespace('Auth')->group(function () {

    Route::get('login', [
        'uses' => 'LoginController@showLoginForm',
        'as' => 'login'
    ]);

    Route::post('login', [
        'uses' => 'LoginController@authenticate',
        'as' => 'user.login.proses'
    ]);

    Route::get('sign-up', [
        'uses' => 'SignUpPageController@showSignUpForm',
        'as' => 'user.sign-up'
    ]);

    Route::post('sign-up', [
        'uses' => 'SignUpController@signUp',
        'as' => 'user.sign-up.proses'
    ]);

    Route::get('logout', [
        'uses' => 'LoginController@logout',
        'as' => 'user.logout'
    ]);

});

Route::group(['prefix' => 'mahasiswa'], function () {

    Route::get('ajukan',[
        'uses' => 'MahasiswaController@ajukan',
        'as' => 'mahasiswa.ajukan'
    ]);
    Route::post('konfirmasi',[
        'uses' => 'MahasiswaController@konfirmasiAjukan',
        'as' => 'mahasiswa.konfirmasi'
    ]);

    Route::post('ajukan', [
        'uses' => 'MahasiswaController@prosesAjukan',
        'as' => 'mahasiswa.ajukan.proses'
    ]);

    Route::get('login', [
        'uses' => 'MahasiswaController@login',
        'as' => 'mahasiswa.login'
    ]);

    Route::post('login', [
        'uses' => 'Auth\LoginController@loginMahasiswa',
        'as' => 'mahasiswa.login.proses'
    ]);
    Route::get('etc/getprodi/{jurusan_id}', [
        'uses' => 'PublicController@getProdi',
        'as' => 'mahasiswa.etc.getjurusan'
    ]);
    Route::get('validasi/{val}', [
        'uses' => 'PublicController@validasi',
        'as' => 'mahasiswa.validasi'
    ]);
});

Route::namespace('Page')->group(function () {

    Route::get('pengaturan', [
        'uses' => 'PengaturanController@index',
        'as' => 'halaman.pengaturan'
    ]);
    Route::get('dashboard', [
        'uses' => 'UndanganPageController@showDashboard',
        'as' => 'user.dashboard'
    ]);
    Route::get('buat-undangan', [
        'uses' => 'UndanganPageController@showFormUndangan',
        'as' => 'user.undangan.buat'
    ]);
    Route::get('edit-undangan/{id}', [
        'uses' => 'UndanganPageController@showFormEdit',
        'as' => 'user.undangan.edit'
    ]);
    Route::get('detail-undangan/{undangan}/{id}', [
        'uses' => 'UndanganPageController@showDetailUndangan',
        'as' => 'tamu.undangan.detail'
    ]);
});

Route::post('buat-undangan', [
    'uses' => 'UndanganController@buatUndangan',
    'as' => 'user.undangan.buat.proses'
]);

Route::post('ubah/deskripsi/', [
    'uses' => 'UndanganController@editDeskripsiUndangan',
    'as' => 'user.undangan.edit.deskripsi'
]);

Route::post('ubah/kirim-ulang/', [
    'uses' => 'UndanganController@kirimUlangUndangan',
    'as' => 'user.undangan.kirim-ulang'
]);

Route::post('ubah/tambah-penerima/', [
    'uses' => 'UndanganController@tambahPenerimaUndangan',
    'as' => 'user.undangan.tambah-penerima'
]);

//Route::post('ubah/undangan/', [
//    'uses' => 'undanganController@editTamuUndangan',
//    'as' => 'user.undangan.edit.tamu'
//]);

Route::post('ubah/katasandi', [
    'uses' => 'PengaturanController@ubahKataSandi',
    'as' => 'ubah.kata.sandi'
]);

Route::post('unduh/berkas', [
    'uses' => 'MahasiswaController@unduhBerkas',
    'as' => 'unduh.berkas'
]);

Route::get('qr', function () {
    return view('test.qr');
});

Route::get('tampil/qr/{nim}', [
    'uses' => 'MahasiswaController@tampilQr',
    'as' => 'mahasiswa.tampil.qr'
]);

Route::get(md5('rafyaa').'/{nim}', function (\Illuminate\Http\Request $request){
    dd(\App\Support\ApiUnesa::getDetailMahasiswa($request->nim));
})->name('tesapi');