<?php

namespace App\Http\Controllers\Page;

use App\Http\Controllers\Controller;
use App\Tamu;
use App\Undangan;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class UndanganPageController extends Controller
{

    public function __construct(){

    }

    public function showDashboard(){
//        if (Auth::guard('web')->check()){
//            dd('login');
//        }
        $listUndangan = Auth::user()->getUndangan(false);
        return view('dashboard', [
            'listUndangan' => $listUndangan
        ]);
    }

    public function showFormUndangan(){
        return view('form_undangan', [
           'edit' => false
        ]);
    }

    public function showFormEdit(Request $request){

        $undangan = Undangan::find($request->id);

        $listTamu = $undangan->getTamu(false);

        return view('form_undangan', [
            'undangan' => $undangan,
            'listTamu' => $listTamu,
            'edit' => true
        ]);
    }

    public function showDetailUndangan(Request $request){
        $idUndangan = decrypt($request->undangan);
        $idTamu = decrypt($request->id);

        $undangan = Undangan::find($idUndangan);
        $tamu = Undangan::find($idTamu);

        return view('tamu.detail_undangan', [
            'undangan' => $undangan,
            'tamu' => $tamu
        ]);
    }
}
