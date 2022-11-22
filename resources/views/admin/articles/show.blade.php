
@extends('layouts.app')
@section('page-name')
    {{$article->title}}
@endsection
@section('content')
    <!-- Default box -->
    <div class="card">
        <div class="card-body">
            <img src="{{asset($article->image)}}" alt="">
            {{$article->content}}
            
        </div>
      </div>
      <!-- /.card -->
@endsection