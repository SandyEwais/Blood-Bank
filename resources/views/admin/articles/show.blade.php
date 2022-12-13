
@extends('admin.layouts.app')
@section('page-name')
    {{$article->title}}
@endsection
@section('content')
    <!-- Default box -->
    <div class="card">
        <div class="card-body">
            <div class="container">
                <div class="col-md-9">
                    <img src="{{asset('storage/'.$article->image)}}" class="img-fluid">
                </div>
            </div>
            <br>
            <p class="text-center"><strong>{{$article->content}}</strong></p>
            
        </div>
      </div>
      <!-- /.card -->
@endsection