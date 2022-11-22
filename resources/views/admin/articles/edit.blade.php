@extends('layouts.app')
@section('page-name')
    Edit Article
@endsection
@section('content')
    <!-- Default box -->
    <div class="card">
        <div class="card-body">
            {!! Form::model($article, [
                'route' => ['categories.update',$article->id],
                'method' => 'put'
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
                {!! Form::text('content', null,[
                    'class' => 'form-control'
                ]) !!}
                @error('content')
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