<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class SignUpPageController extends Controller
{
    public function showSignUpForm(){
        return view('auth.sign_up');
    }
}
