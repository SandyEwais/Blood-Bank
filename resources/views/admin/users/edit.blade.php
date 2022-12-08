{{-- {{dd($selectedRoles)}} --}}
@inject('roles', 'Spatie\Permission\Models\Role')
@php
    $roles = $roles->pluck('name','id')->toArray();
@endphp

@extends('layouts.app')
@section('page-name')
    Create New User
@endsection
@section('content')
    <!-- Default box -->
    <div class="card">
        <div class="card-body">
            {!! Form::model($user, [
                'route' => ['users.update',$user->id],
                'method' => 'put'
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
                {!! Form::label('email', 'Email') !!}
                {!! Form::email('email', null,[
                    'class' => 'form-control'
                ]) !!}
                @error('email')
                    <p class="text-danger">{{$message}}</p>
                @enderror
            </div>
            {!! Form::label('roles', 'Roles') !!}
            <div class="form-group">
                {!! Form::select('roles[]', $roles, $selectedRoles, [
                    'class' => 'form-control',
                    'multiple' => 'multiple'
                ]) !!}
                @error('roles')
                    <p class="text-danger">{{$message}}</p>
                @enderror
            </div>
            
            <div class="form-group">
                {!! Form::label('password', 'Password') !!}
                {!! Form::password('password',[
                    'class' => 'form-control'
                ]) !!}
                @error('password')
                    <p class="text-danger">{{$message}}</p>
                @enderror
            </div>
            <div class="form-group">
                {!! Form::label('password_confirmation', 'Confirm Password') !!}
                {!! Form::password('password_confirmation',[
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
            </div>
            {!! Form::close() !!}
            
        </div>
      </div>
      <!-- /.card -->
@endsection