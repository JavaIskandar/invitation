<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Undangan extends Model
{
    protected $table = 'undangan';

    protected $fillable = [
        'user_id', 'nama_agenda', 'nama_pengirim', 'alamat', 'tanggal', 'jam', 'keterangan', 'created_at', 'updated_at'
    ];

    public function getUser($query = true){
        return $query ? $this->belongsTo('App\User', 'user_id') : $this->belongsTo('App\User', 'user_id')->get();
    }

    public function getTamu($query = true){
        return $query ? $this->hasMany('App\Tamu', 'undangan_id') : $this->hasMany('App\Tamu', 'undangan_id')->get();
    }
}
