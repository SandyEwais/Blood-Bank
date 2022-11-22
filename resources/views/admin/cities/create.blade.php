@inject('model', 'App\Models\City')
@extends('layouts.app')
@section('page-name')
    Create New City
@endsection
@section('content')
    <!-- Default box -->
    <div class="card">
        <div class="card-body">
            {!! Form::model($model, [
                'route' => 'cities.store'
            ]) !!}
            <div class="form-group">
                {!! Form::label('name', 'Name') !!}
                {!! Form::text('name', null,[
                    'class' => 'form-control'
                ]) !!}
                @error('name')
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