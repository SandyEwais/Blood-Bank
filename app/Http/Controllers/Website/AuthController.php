<?php

namespace App\Http\Controllers\Website;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(){
        return view('website.auth.login');
    }
    //authenticate
    public function authenticate(Request $request){
        $credentials = $request->validate([
            'phone' => 'required',
            'password' => 'required'
        ]);
        Auth::guard('web-clients');
 
        if (Auth::guard('web-clients')->attempt($credentials)) {
            $request->session()->regenerate();
 
            return redirect()->route('home');
        }
 
        return back()->withErrors([
            'phone' => 'The provided credentials do not match our records.',
        ])->onlyInput('phone');
    }
}
