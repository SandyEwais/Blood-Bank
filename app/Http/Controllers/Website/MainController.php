<?php

namespace App\Http\Controllers\Website;

use App\Models\Article;
use Illuminate\Http\Request;
use App\Models\DonationRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class MainController extends Controller
{
    public function home(Request $request){

        
        $articles = Article::take(9)->get();
        $donationRequests = DonationRequest::where(function($query) use($request){
            if($request->has('city_id')){
                $query->where('city_id',$request->city_id);
            }
            if($request->has('blood_type_id')){
                $query->where('blood_type_id',$request->blood_type_id); 
            }
        })->take(4)->get();
        return view('website.pages.home',compact('articles','donationRequests'));
    }

    public function donationRequests(Request $request){
        $donationRequests = DonationRequest::where(function($query) use($request){
            if($request->has('city_id')){
                $query->where('city_id',$request->city_id);
            }
            if($request->has('blood_type_id')){
                $query->where('blood_type_id',$request->blood_type_id); 
            }
        })->get();
        return view('website.pages.donation-requests');
    }

    public function toggleFavourite(Request $request){
        dd(Auth::guard('web-clients')->user());
        $article = Auth::guard('web-clients')->user()->articles()->toggle($request->article_id);
        return responseJson(200,'success',$article);
    }
}
