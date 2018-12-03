<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tamu extends Model
{
    protected $table = 'tamu';

    protected $fillable = [
        'undangan_id', 'konfirmasi_undangan', 'konfirmasi_kedatangan', 'email', 'created_at', 'updated_at'
    ];

    public function getUser($queryReturn = true){
        return $queryReturn ? $this->getUndangan()->getUser() : $this->getUndangan()->getUser()->first();
    }

    public function getUndangan($query = true){
        return $query ? $this->belongsTo('App\Undangna', 'undangan_id') : $this->belongsTo('App\Undangna', 'undangan_id')->first();
    }
}
