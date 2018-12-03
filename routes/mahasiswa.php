<?php

Route::group(['prefix' => 'mahasiswa'], function () {

    Route::get('dashboard', [
        'uses'=> 'MahasiswaController@dashboard',
        'as'=>'mahasiswa.dashboard'
    ]);

    Route::get('edit', [
        'uses' => 'MahasiswaController@edit',
        'as' => 'mahasiswa.edit'
    ]);

    Route::post('perbaruiBerkas', [
        'uses' => 'MahasiswaController@perbaruiBerkas',
        'as' => 'mahasiswa.berkas.perbarui'
    ]);
    Route::post('perbaruiPassword', [
        'uses' => 'MahasiswaController@perbaruiPassword',
        'as' => 'mahasiswa.password.perbarui'
    ]);
    Route::post('perbaruiEmail', [
        'uses' => 'MahasiswaController@perbaruiEmail',
        'as' => 'mahasiswa.email.perbarui'
    ]);
    Route::get('unduh', [
        'uses' => 'MahasiswaController@unduh',
        'as' => 'mahasiswa.unduh'
    ]);
});