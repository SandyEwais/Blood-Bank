<?php

namespace App\Http\Controllers\Api;
use App\Models\City;
use App\Models\Article;
use App\Models\Category;
use App\Models\Settings;
use App\Models\BloodType;
use App\Models\Governorate;
use App\Models\Notification;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\DonationRequest;
use App\Models\Token;
use Illuminate\Support\Facades\Redis;

class MainController extends Controller
{
    
    public function cities(Request $request){
        $cities = City::where(function($query)use($request){
            if($request->has('governorate_id')){
                $query->where('governorate_id',$request->governorate_id);
            }
        })->get();
        return responseJson('1','success',$cities);
    }
    public function governorates(){
        $governorates = Governorate::all();
        return responseJson('1','success',$governorates);
    }
    public function articles(Request $request){
        $articles = Article::where(function($query) use($request){
            if($request->has('search')){
                $query->filter(request(['search']));
            }
            if($request->has('category_id')){
                $query->where('category_id',$request->category_id);
            }
            if($request->has('article_id')){
                $query->where('id',$request->article_id);
            }
        })->latest()->get();
        return responseJson('1','success',$articles);
    }
    public function bloodTypes(){
        $blood_types = bloodType::all();
        return responseJson('1','success',$blood_types);
    }
    public function categories(){
        $categories = Category::all();
        return responseJson('1','success',$categories);
    }
    
    public function settings(){
        $settings = Settings::first();
        if($settings){
            return responseJson('1','success',$settings);
        }else{
            return responseJson('0','failure');  
        }
    }

    public function notifications(Request $request){
        $notifications = $request->user()->notifications();
        return responseJson('1','success',$notifications);
    }

    public function toggleFavourite(Request $request){
        $article = $request->user()->articles()->toggle($request->article_id);
        return responseJson('1','success',$article);
    }

    public function getFavourites(Request $request){
        $articles = $request->user()->articles;
        return responseJson('1','success',$articles);
    }

    public function addDonationRequest(Request $request){
        $validator = validator()->make($request->all(),[
            'patient_name' => 'required',
            'patient_age' => 'required',
            'blood_type_id' => 'required',
            'blood_bags' => 'required',
            'hospital_name' => 'required',
            'latitude' => 'required',
            'longitude' => 'required',
            'city_id' => 'required',
            'governorate_id' => 'required',
            'patient_phone' => 'required'
        ]);
        if($validator->fails()){
            return responseJson('0','failure',$validator->errors());
        }
        $donationRequest = DonationRequest::create($request->all());
        $clientsIds = $donationRequest->governorate->clients()->whereHas('bloodTypes',function($q) use($request){
            $q->where('blood_type_id',$request->blood_type_id);
        })->pluck('id')->toArray();

        if(count($clientsIds)){
            $notification = Notification::create([
                'title' => 'New Request !',
                'content' => 'help save human life near you',
                'donation_request_id' => $donationRequest->id
            ]);
            $notification->clients()->attach($clientsIds);

            $tokens = Token::whereIn('client_id',$clientsIds)->pluck('token')->toArray();
            if(count($tokens)){
                $title = $notification->title;
                $content = $notification->content;
                $date = [
                    'donation_request_id' => $notification->donation_request_id
                ];
            }

            
        }
    }


    public function getDonationRequest(Request $request){
        $donationRequests = DonationRequest::where(function($query) use($request){
            if($request->has('governorate_id')){
                $query->where('governorate_id',$request->governorate_id);
            }
            if($request->has('blood_type_id')){
                $query->where('blood_type_id',$request->blood_type_id); 
            }
            if($request->has('donation_request_id')){
                $query->where('id',$request->donation_request_id); 
            }
        })->latest()->get();
        return responseJson('1','success',$donationRequests);
        
    }
}
