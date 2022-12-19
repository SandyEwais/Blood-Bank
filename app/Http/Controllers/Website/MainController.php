<?php

namespace App\Http\Controllers\Website;

use App\Models\Article;
use Illuminate\Http\Request;
use App\Models\DonationRequest;
use App\Http\Controllers\Controller;
use App\Models\Client;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpKernel\Profiler\Profile;

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
    public function notificationSettings(Client $client){
        $selected_blood_types = $client->bloodTypes()->pluck('id')->toArray();
        $selected_governorates = $client->governorates()->pluck('id')->toArray();
        return view('website.pages.notification-settings',[
            'selected_blood_types' => $selected_blood_types,
            'selected_governorates' => $selected_governorates
        ]);
    }
    public function saveNotificationSettings(Request $request){
        $client = Auth::guard('web-clients')->user();
        $client->bloodTypes()->sync($request->blood_type_id);
        $client->governorates()->sync($request->governorate_id);
        return redirect()->back()->with('message','تم التحديث بنجاح !');
    }

    public function profile(Client $client){
        return view('website.pages.profile',[
            'client' => $client
        ]);
    }
    public function saveProfile(Request $request){
        $request->validate([
            'name' => 'required|max:50',
            'email' => 'required|unique:clients,email,'.Auth::guard('web-clients')->user()->id,
            'phone' => 'required|unique:clients,phone,'.Auth::guard('web-clients')->user()->id,
            'blood_type_id' => 'required',
            'city_id' => 'required',
            'd_o_b' => 'required',
            'last_donation_date' => 'required'
        ]);
        Auth::guard('web-clients')->user()->update($request->all());
        return 'success';
    }

    public function articles(){
        $articles = Article::all();
        return view('website.pages.articles',compact('articles'));
    }
    public function article(Article $article){
        return view('website.pages.article-details',compact('article'));
    }

    public function favourites(){
        $client = Auth::guard('web-clients')->user();
        $favourites = $client->articles;
        return view('website.pages.favourites',compact('favourites'));
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
