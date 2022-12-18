<?php

namespace App\Http\Controllers\Website;

use App\Models\Client;
use App\Mail\ResetPassword;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class AuthController extends Controller
{
    //register view
    public function register(){
        return view('website.auth.register');
    }
    //create new client
    public function create(Request $request){
        $request->validate([
            'name' => 'required|max:50',
            'email' => 'required|unique:clients',
            'phone' => 'required|unique:clients',
            'password' => 'required|confirmed',
            'blood_type_id' => 'required',
            'city_id' => 'required',
            'd_o_b' => 'required',
            'last_donation_date' => 'required'
        ]);
        $request->merge(['password'=> bcrypt($request->password)]);
        $client = Client::create($request->all());
        $client->bloodTypes()->attach($client->blood_type_id);
        $client->governorates()->attach($client->city->governorate_id);
        return redirect()->route('clients.login');
    }
    //login view
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
    //logout
    public function logout(Request $request){
        Auth::guard('web-clients')->logout();
    
        $request->session()->invalidate();
    
        $request->session()->regenerateToken();
    
        return redirect()->route('clients.login');
    }
    //forgot password view
    public function forgotPassword(){
        return view('website.auth.forgot-password');
    }
    //check valid email and send pin code
    public function sendPinCode(Request $request){
        $request->validate([
            'email' => 'email|required'
        ]);
        $client = Client::where('email',$request->email)->first();
        if($client){
            $code = rand(1111111,9999999);
            $update = $client->update(['pin_code' => $code]);
            if($update){
                //email
                Mail::to($client->email)
                ->send(new ResetPassword($code));
                return redirect()->route('clients.enter-pin-code');
            }
        }
        return redirect()->back()->with('message','Please Try Again');
    }
    //pin code view
    public function enterPinCode(){
        return view('website.auth.pin-code');
    }
    //confirm pin code
    public function confirmPinCode(Request $request){
        $request->validate([
            'pin_code' => 'required|NotIn:0',
            'password' => 'required|confirmed'
        ]);
        $client = Client::where('pin_code',$request->pin_code)->first();
        if($client){
            $client->pin_code = null;
            $client->password = bcrypt($request->password);
            if($client->save()){
                return redirect()->route('clients.login')->with('message',"You've Changed Your Password Successfully");
            }
        }
        return redirect()->back()->with('message','Invalid Pin Code');
    }
}
