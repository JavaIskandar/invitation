<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SignUpController extends Controller
{
    public function signUp(Request $request){

        $this->validate($request, [
            'nama' => 'required',
            'email' => 'required',
            'jenis_kelamin' => 'required',
            'tanggal_lahir' => 'required',
            'password' => 'required',
            'confirm_password' => 'required',
        ]);

        if ($request->password != $request->confirm_password){
            return back()->with('message', 'Konfirmasi password tidak sama');
        }

        //dd($request->jenis_kelamin);

        $user = User::create([
            'nama' => $request->nama,
            'email' => $request->email,
            'jenis_kelamin' => $request->jenis_kelamin,
            'tanggal_lahir' => $request->tanggal_lahir,
            'password' => bcrypt($request->password)
        ]);

        //Auth::attempt(['id' => $user->id, 'password' => $user->email]);

        Auth::guard('web')->login($user);

        return redirect()->route('user.dashboard');
    }

    public function red(){
        if (Auth::check()){
            dd('login');
        }
        else{
            dd('');
        }
    }
}
