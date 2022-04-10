<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    //
    public function index(){
        $credentials = request()->validate([
            'email'=>"required|email",
            "password"=>"required"
        ]);
        // $user = User::where("email", $request->email)->first();
        if(Auth::attempt($credentials)){
            request()->session()->regenerate();
            return redirect()->intended('/');
        };
        
    }
}
