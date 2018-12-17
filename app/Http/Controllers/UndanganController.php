<?php

namespace App\Http\Controllers;

use App\Mail\EmailUndangan;
use App\Tamu;
use App\Undangan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Mail;
use BaconQrCode\Writer;
use Barryvdh\DomPDF\Facade as PDF;
use App;

class UndanganController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->only([
            'buatUndangan', 'kirimUlangUndangan', 'tambahPenerimaUndangan', 'editDeskripsiUndangan'
        ]);
    }

    public function buatUndangan(Request $request)
    {
        $lat = $request->lat;
        $lng = $request->lng;
        $undangan = Undangan::create([
            'user_id' => Auth::user()->id,
            'nama_agenda' => $request->nama_agenda,
            'nama_pengirim' => $request->nama_pengirim,
            'alamat' => $request->alamat,
            'tanggal' => $request->tanggal,
            'jam' => $request->jam,
            'keterangan' => $request->keterangan,
            'lat' => $lat,
            'lng' => $lng
        ]);
        $tamuArray = explode("\n", $request->email_tamu);

        foreach ($tamuArray as $tamu){
            $email = trim(preg_replace('/\s\s+/', ' ', $tamu));
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                return back()->with('error', 'Invalid email format');
            }
        }

        foreach ($tamuArray as $item) {

            $tamu = Tamu::create([
                'undangan_id' => $undangan->id,
                'konfirmasi_undangan' => false,
                'konfirmasi_kedatangan' => false,
                'email' => $item
            ]);

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
        }

        return redirect()->route('user.dashboard');
    }

    public function kirimUlangUndangan(Request $request){

        $undangan = Undangan::find($request->id);
        $tamu = $undangan->getTamu(false);

        foreach ($tamu as $item){
            $email = trim(preg_replace('/\s\s+/', ' ', $item->email));
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

        foreach ($tamuArray as $item){
            $email = trim(preg_replace('/\s\s+/', ' ', $item));
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                return back()->with('error', 'Invalid email format');
            }
        }

        foreach ($tamuArray as $item) {

            $tamu = Tamu::create([
                'undangan_id' => $request->id,
                'konfirmasi_undangan' => false,
                'konfirmasi_kedatangan' => false,
                'email' => $item
            ]);

            $data = [
                'nama_agenda' => $request->nama_agenda,
                'nama_pengirim' => $request->nama_pengirim,
                'tamu' => $item,
                'tanggal' => $request->tanggal,
                'undangan_id' => $request->id,
                'tamu_id' => $tamu->id
            ];
            Mail::to($item)->send(new EmailUndangan($data));
        }

        return redirect()->route('user.dashboard');
    }

    public function editDeskripsiUndangan(Request $request){
        $undangan = Undangan::find($request->id);
        $undangan->update([
            'nama_agenda' => $request->nama_agenda,
            'nama_pengirim' => $request->nama_pengirim,
            'alamat' => $request->alamat,
            'tanggal' => $request->tanggal,
            'jam' => $request->jam,
            'keterangan' => $request->keterangan,
            'lat' => $request->lat,
            'lng' => $request->lng
        ]);
        return redirect()->route('user.dashboard');
    }

    public function konfirmasiKedatangan(Request $request){
        $tamu = Tamu::find(decrypt($request->id));
        $tamu->konfirmasi_kedatangan = true;
        $tamu->save();
        return back();
    }

    public function konfirmasiUndangan(Request $request){
        $tamu = Tamu::find(decrypt($request->id));
        $tamu->konfirmasi_undangan = true;
        $tamu->save();

        return $this->unduhSurat($tamu->id);
    }

    public function unduhSurat($id){
        $renderer = new \BaconQrCode\Renderer\Image\Png();
        $renderer->setHeight(256);
        $renderer->setWidth(256);
        $writer = new \BaconQrCode\Writer($renderer);
        $qrName = $id;
        $val = route('tamu.verifikasi', ['id' => $id]);
        $writer->writeFile($val, 'images/qrCode/'.$qrName.'.png');

        $tamu = Tamu::find($id);
        $undangan = $tamu->getUndangan(false);


        $d = PDF::loadView('tamu.undangan', [
            'undangan' => $undangan,
            'tamu' => $tamu,
            'verifikasi' => false
        ])->download('Invitation '.$id.'.pdf');

        File::delete(public_path('images/qrCode/'.$qrName.'.png'));

        return $d;
    }

    public function tampilQr($id)
    {
        try {
            return response()->file(storage_path('app/public/qrCode/images/' . $id . '.png'));
        } catch (ModelNotFoundException $err) {
            return 'Tidak dapat menemukan qr code';
        }
    }
}
