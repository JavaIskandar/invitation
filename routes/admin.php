<?php

Route::group(['prefix' => 'admin'], function (){
    Route::get('kalabkasublab', [
        'uses' => 'AdminController@kalabKasublab',
        'as' => 'admin.kalabkasublab'
    ]);

    Route::get('mahasiswa/{id}', [
        'uses' => 'AdminController@mahasiswa',
        'as' => 'admin.mahasiswa'
    ]);

    Route::patch('mahasiswa/reset', [
        'uses' => 'AdminController@resetMahasiswa',
        'as' => 'admin.mahasiswa.reset'
    ]);

    Route::get('etc/getmahasiswa/{jurusan}', [
        'uses' => 'AdminController@getMahasiswa',
        'as' => 'admin.etc.getmahasiswa'
    ]);

    Route::get('etc/getprodi/{jurusan_id}', [
        'uses' => 'PublicController@getProdi',
        'as' => 'admin.etc.getjurusan'
    ]);

    Route::put('kalabkasublab/tambah', [
        'uses' => 'AdminController@tambahKalabKasublab',
        'as' => 'admin.kalabkasublab.tambah'
    ]);

    Route::delete('kalabkasublab/hapus', [
        'uses' => 'AdminController@hapusKalabKasublab',
        'as' => 'admin.kalabkasublab.hapus'
    ]);

    Route::patch('kalabkasublab/reset', [
        'uses' => 'AdminController@resetUser',
        'as' => 'admin.kalabkasublab.reset'
    ]);

    Route::get('etc', [
        'uses' => 'AdminController@etc',
        'as' => 'admin.etc'
    ]);

    Route::post('link/update', [
        'uses' => 'AdminController@updateLink',
        'as' => 'admin.link.update'
    ]);

    Route::post('etc/kalab/update', [
        'uses' => 'AdminController@ubahKalabTambahKasublab',
        'as' => 'admin.etc.kalab.update'
    ]);

    Route::post('etc/sinkron', [
        'uses' => 'AdminController@sinkron',
        'as' => 'admin.etc.sinkron'
    ]);
});