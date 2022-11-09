<?php

namespace App\Http\Controllers\Api;

use App\Models\Client;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Mail\ResetPassword;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\Rule;
use Whoops\Run;

class AuthController extends Controller
{


    public function register(Request $request){
        $validator = validator()->make($request->all(),[
            'name' => 'required|max:50',
            'email' => 'required|unique:clients',
            'phone' => 'required|unique:clients',
            'password' => 'required|confirmed',
            'blood_type_id' => 'required',
            'city_id' => 'required',

        ]);
        if($validator->fails()){
            return responseJson('0','failure',$validator->errors());
        }
        $request->merge(['password'=> bcrypt($request->password)]);
        $client = Client::create($request->all());
        $client->api_token = Str::random(60);
        $client->save();
        return responseJson('1','success',[
            'client' => $client,
            'api_token' =>$client->api_token
        ]);
    }

    public function login(Request $request){
        $validator = validator()->make($request->all(),[
            'phone' => 'required',
            'password' => 'required'

        ]);
        if($validator->fails()){
            return responseJson('0','failure',$validator->errors());
        }
        $client = Client::where('phone',$request->phone)->first();
        if($client){
            if(Hash::check($request->password, $client->password)){
                return responseJson('1','success',[
                    'client' => $client,
                    'api_token' => $client->api_token
                ]);
            }else{
                return responseJson('0','failure','password failure');
            }
        }else{
            return responseJson('0','failure','phone failure');
        }
    }


    public function forgotPassword(Request $request){
        $validator = validator()->make($request->all(),[
            'phone' => 'required'
        ]);
        if($validator->fails()){
            return responseJson('0','failure',$validator->errors());
        }
        $client = Client::where('phone',$request->phone)->first();
        if($client){
            $code = rand(1111111,9999999);
            $update = $client->update(['pin_code' => $code]);
            if($update){
                //email
                Mail::to($client->email)
                ->bcc("sosoeid911@gmail.com")
                ->send(new ResetPassword($code));
                
                return responseJson('1','Please Kindly Check Your Email',[
                    'pin_code' => $code
                ]);
            }else{
                return responseJson('0','failure','something went wrong, please try again');
            }

        }else{
            return responseJson('0','invalid phone');
        }
    }

    public function resetPassword(Request $request){
        $validator = validator()->make($request->all(),[
            'pin_code' => 'required|NotIn:0',
            'password' => 'required|confirmed'
        ]);
        if($validator->fails()){
            return responseJson('0','failure',$validator->errors());
        }
        $client = Client::where('pin_code',$request->pin_code)->first();
        if($client){
            $client->pin_code = null;
            $client->password = bcrypt($request->password);
            if($client->save()){
                return responseJson('1','Password Has Been Updated Successfully');
            }else{
                return responseJson('0','something went wrong, please try again');
            }

        }else{
            return responseJson('0','invalid code');
        }
    }

    public function profile(Request $request){
        $validator = validator()->make($request->all(),[
            'password' => 'confirmed',
            'phone' => Rule::unique('clients')->ignore($request->user()->id),
            'email' => Rule::unique('clients')->ignore($request->user()->id)
        ]);
        if($validator->fails()){
            return responseJson('0',$validator->errors()->first(),$validator->errors());
        }
        $client = $request->user();
        $request->merge(['password'=> bcrypt($request->password)]);
        $client->update($request->all());
    }

}
