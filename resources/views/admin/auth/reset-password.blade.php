@inject('user', 'App\Models\User')
@extends('layouts.app')
@section('page-name')
    Reset Password
@endsection
@section('content')

    <div class="card-body">
        <div class="card card-light card-outline">
        <div class="card-body">
            {!! Form::model($user, [
                'route' => 'update'
            ]) !!}
            <div class="form-group">
                {!! Form::label('current_password', 'Current Password') !!}
                {!! Form::password('current_password', null,[
                    'class' => 'form-control'
                ]) !!}
                @error('current_password')
                    <p class="text-danger">{{$message}}</p>
                @enderror
            </div>
            <div class="form-group">
                {!! Form::label('password', 'New Password') !!}
                {!! Form::password('password', null,[
                    'class' => 'form-control'
                ]) !!}
                @error('password')
                    <p class="text-danger">{{$message}}</p>
                @enderror
            </div>
            <div class="form-group">
                {!! Form::label('password_confirmation', 'Confirm Password') !!}
                {!! Form::password('password_confirmation', null,[
                    'class' => 'form-control'
                ]) !!}
                @error('password_confirmation')
                    <p class="text-danger">{{$message}}</p>
                @enderror
            </div>
            <div class="form-group">
                {!! Form::submit('Submit', [
                    'class' => 'btn btn-info'
                ]) !!}
            </div>
            {!! Form::close() !!}
        </div>
    </div>

@endsection



