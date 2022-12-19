
@extends('website.layouts.app',[
    'bodyClass' => 'donation-requests'
])
@section('content')
<div class="all-requests">
    <div class="container title mb-4 d-flex justify-content-center align-items-center">
        <div class="head-text">
            <h2>المفضلة</h2>
        </div>
    </div>
    <div class="view">
        <div class="container">
            <div class="path">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('home')}}">الرئيسية</a></li>
                        <li class="breadcrumb-item active" aria-current="page">المفضلة</li>
                    </ol>
                </nav>
            </div>
            
            <div class="row">
                <!-- Set up your HTML -->
                @foreach ($favourites as $article)
                    <div class="col-3-sm">
                        <div class="card m-2">
                            <div class="photo">
                                <img src="{{asset('websiteAssets/imgs/p2.jpg')}}" class="card-img-top" alt="...">
                                <a href="{{route('article-details',['article' => $article->id])}}" class="click">المزيد</a>
                            </div>

                                <i id="{{$article->id}}" onclick="toggleFavourite(this)" class="{{$article->IsFavourite ? 'favourite' : 'notfavourite'}} far fa-heart"></i>
                            

                            <div class="card-body">
                                <h5 class="card-title">{{$article->title}}</h5>
                                <p class="card-text">
                                    {{Str::limit($article->content,50)}}
                                </p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
               
        </div>
    </div>
</div>
@endsection
