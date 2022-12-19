
@extends('website.layouts.app',[
    'bodyClass' => 'who-are-us'
])
@section('content')
    <div class="about-us">
        <div class="container">
            <div class="path">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">الرئيسية</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{$article->category->name}}</li>
                    </ol>
                </nav>
            </div>
            <div class="details">
                <div class="">
                    <img src="{{asset('storage/'.$article->image)}}">
                </div>
                <div class="text">
                    <p>
                        {{$article->content}}
                    </p>
                </div>
            </div>
        </div>
    </div>
@endsection
