
@extends('website.layouts.app',[
    'bodyClass' => 'donation-requests'
])
@section('content')
<div class="articles">
    <div class="container title">
        <div class="head-text">
            <h2>المقالات</h2>
        </div>
    </div>
    <div class="view">
        <div class="container">
            <div class="row">
                <!-- Set up your HTML -->
                    @foreach ($articles as $article)
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
