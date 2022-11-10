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
    public function articles(Request $request, Article $article){
        $articles = Article::where(function($query) use($request,$article){
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

    public function notifications(){
        $notifications = Notification::paginate(10);
        return responseJson('1','success',$notifications);
    }
}
