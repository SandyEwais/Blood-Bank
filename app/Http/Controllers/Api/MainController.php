<?php

namespace App\Http\Controllers\Api;
use App\Models\City;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\BloodType;
use App\Models\Category;
use App\Models\Governorate;
use App\Models\Settings;

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
        $articles = Article::where(function($query)use($request,$article){
            if($request->has('search')){
                $query->latest()->filter(request(['search']),$article->columns)->get();
            }
            if($request->has('category_id')){
                $query->latest()->where('category_id',$request->category_id)->get();
            }
            if($request->has('article_id')){
                $query->where('id',$request->article_id)->get();
            }
        })->get();
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
        $settings = Settings::all();
        return responseJson('1','success',$settings);
    }
}
