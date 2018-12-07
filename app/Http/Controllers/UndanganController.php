<?php

namespace App\Http\Controllers;

use App\Mail\EmailUndangan;
use App\Tamu;
use App\Undangan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

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

        foreach ($tamuArray as $tamu){
            $email = trim(preg_replace('/\s\s+/', ' ', $tamu->email));
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                return back()->with('error', 'Invalid email format');
            }
        }

        foreach ($tamuArray as $tamu) {
            $data = [
                'nama_agenda' => $request->nama_agenda,
                'nama_pengirim' => $request->nama_pengirim,
                'tamu' => $tamu,
                'tanggal' => $request->tanggal,
                'undangan_id' => $undangan->id,
                'tamu_id' => $tamu->id
            ];

            $email = trim(preg_replace('/\s\s+/', ' ', $tamu->email));
            Mail::to($email)->send(new EmailUndangan($data));

            Tamu::create([
                'undangan_id' => $undangan->id,
                'konfirmasi_undangan' => false,
                'konfirmasi_kedatangan' => false,
                'email' => $tamu
            ]);
        }

        return redirect()->route('user.dashboard');
    }

    public function kirimUlangUndangan(Request $request){

        $undangan = Undangan::find($request->id);
        $tamu = $undangan->getTamu(false);

        foreach ($tamu as $item){
            $email = trim(preg_replace('/\s\s+/', ' ', $tamu->email));
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                return back()->with('error', 'Invalid email format');
            }
        }

        foreach ($tamu as $item){
            $data = [
                'nama_agenda' => $undangan->nama_agenda,
                'nama_pengirim' => $undangan->nama_pengirim,
                'tanggal' => $undangan->tanggal,
                'undangan_id' => $request->id,
                'tamu_id' => $item->id
            ];
            $email = trim(preg_replace('/\s\s+/', ' ', $item->email));
            Mail::to($email)->send(new EmailUndangan($data));
        }

        return redirect()->route('user.dashboard');
    }

    public function tambahPenerimaUndangan(Request $request){

        $tamuArray = explode("\n", $request->email_tamu);

        foreach ($tamuArray as $tamu){
            $email = trim(preg_replace('/\s\s+/', ' ', $tamu));
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                return back()->with('error', 'Invalid email format');
            }
        }

        foreach ($tamuArray as $tamu) {

            Tamu::create([
                'undangan_id' => $request->id,
                'konfirmasi_undangan' => false,
                'konfirmasi_kedatangan' => false,
                'email' => $tamu
            ]);

            $data = [
                'nama_agenda' => $request->nama_agenda,
                'nama_pengirim' => $request->nama_pengirim,
                'tamu' => $tamu,
                'tanggal' => $request->tanggal,
                'undangan_id' => $request->id,
                'tamu_id' => $tamu->id
            ];
            Mail::to('iskandarjava@yahoo.co.id')->send(new EmailUndangan($data));
        }

        return redirect()->route('user.dashboard');
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
        return redirect()->route('user.dashboard');
    }

    public function konfirmasiKedatangan(){

    }

}
