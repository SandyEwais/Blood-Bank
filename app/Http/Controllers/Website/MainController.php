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

    public function articles(){
        $articles = Article::all();
        return view('website.pages.articles',compact('articles'));
    }
    public function article(Article $article){
        return view('website.pages.article-details',compact('article'));
    }

    public function donationRequests(Request $request){
        $donationRequests = DonationRequest::where(function($query) use($request){
            if($request->has('city_id')){
                $query->where('city_id',$request->city_id);
            }
            if($request->has('blood_type_id')){
                $query->where('blood_type_id',$request->blood_type_id); 
            }
        })->paginate(6);
        return view('website.pages.donation-requests',compact('donationRequests'));
    }
    public function donationRequest(DonationRequest $donationRequest){
        return view('website.pages.donation-request-details',[
            'donationRequest' => $donationRequest
        ]);
    }

    public function toggleFavourite(Request $request){
        dd(Auth::guard('web-clients')->user());
        $article = Auth::guard('web-clients')->user()->articles()->toggle($request->article_id);
        return responseJson(200,'success',$article);
    }

    public function aboutBloodBank(){
        return view('website.pages.about-blood-bank');
    }
    public function aboutUs(){
        return view('website.pages.about-us');
    }
    public function contactUs(){
        return view('website.pages.contact-us');
    }

}
