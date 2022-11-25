
@extends('layouts.app')
@section('page-name')
    Edit Article
@endsection
@section('content')
    <!-- Default box -->
    <div class="card">
        <div class="card-body">
            {!! Form::model($article, [
                'route' => ['articles.update',$article->id],
                'method' => 'put',
                'enctype' => 'multipart/form-data'
            ]) !!}
            <div class="form-group">
                {!! Form::label('title', 'Title') !!}
                {!! Form::text('title', null,[
                    'class' => 'form-control'
                ]) !!}
                @error('title')
                    <p class="text-danger">{{$message}}</p>
                @enderror
            </div>
            <div class="form-group">
                {!! Form::label('content', 'Content') !!}
                {!! Form::textarea('content', null,[
                    'class' => 'form-control'
                ]) !!}
                @error('content')
                    <p class="text-danger">{{$message}}</p>
                @enderror
            </div>
            <div class="form-group">
                {!! Form::label('category_id', 'Category') !!}
                {!! Form::select('category_id', $categories->pluck('name','id')->toArray(),null, [
                    'class' => 'form-control'
                ]) !!}
                @error('category_id')
                    <p class="text-danger">{{$message}}</p>
                @enderror
            </div>
            <div class="form-group">
                {!! Form::label('image', 'Image') !!}
                {!! Form::file('image', [
                    'class' => 'form-control'
                ]) !!}
                @error('image')
                    <p class="text-danger">{{$message}}</p>
                @enderror
            </div>
            <div class="form-group">
                {!! Form::submit('Submit', [
                    'class' => 'btn btn-info'
                ]) !!}
            </div>
            </div>
            {!! Form::close() !!}
            
        </div>
      </div>
      <!-- /.card -->
@endsection