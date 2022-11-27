<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    //login page
    public function login(){
        return view('admin.auth.login');
    }
    //authenticate
    public function authenticate(Request $request){
        $credentials = $request->validate([
            'email' => 'email|required',
            'password' => 'required'
        ]);
 
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
 
            return redirect()->route('dashboard');
        }
 
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }
    //logout
    public function logout(Request $request){
        Auth::logout();
    
        $request->session()->invalidate();
    
        $request->session()->regenerateToken();
    
        return redirect()->route('login');
    }
    //reset page
    public function reset(){
        return view('admin.auth.reset-password');
    }
    //update password
    public function update(Request $request){
        $request->validate([
            'current_password' => 'required',
            'password' => 'required|confirmed'
        ]);
        
        if(Hash::check($request->current_password,auth()->user()->password)){
            $hashedPassword = Hash::make($request->password);
            auth()->user()->update([
                'password' => $hashedPassword
            ]);
            return redirect()->route('dashboard');
        }
        
        return back();
    }


    public function index(){
        $users = User::paginate(10);
        return view('admin.users.index',compact('users'));
    }
}
