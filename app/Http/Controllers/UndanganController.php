<?php

namespace App\Http\Controllers;

use App\Tamu;
use App\Undangan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UndanganController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function buatUndangan(Request $request)
    {
        $undangan = Undangan::create([
            'user_id' => Auth::user()->id,
            'nama_agenda' => $request->nama_agenda,
            'nama_pengirim' => $request->nama_pengirim,
            'alamat' => $request->alamat,
            'tanggal' => $request->tanggal,
            'jam' => $request->jam,
            'keterangan' => $request->keterangan
        ]);

        $tamuArray = explode("\n", $request->email_tamu);

        foreach ($tamuArray as $tamu) {
            Tamu::create([
                'undangan_id' => $undangan->id,
                'konfirmasi_undangan' => false,
                'konfirmasi_kedatangan' => false,
                'email' => $tamu
            ]);
        }
    }

    public function editDeskripsiUndangan(Request $request){
        $undangan = Undangan::update([
            'user_id' => Auth::user()->id,
            'nama_agenda' => $request->nama_agenda,
            'nama_pengirim' => $request->nama_pengirim,
            'alamat' => $request->alamat,
            'tanggal' => $request->tanggal,
            'jam' => $request->jam,
            'keterangan' => $request->keterangan
        ]);
    }
}
