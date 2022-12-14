
@extends('website.layouts.app',[
    'bodyClass' => 'signin-account'
])
@section('content')
    <!--form-->
    <div class="form">
        <div class="container">
            <div class="path">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">الرئيسية</a></li>
                        <li class="breadcrumb-item active" aria-current="page">استعادة كلمة المرور</li>
                    </ol>
                </nav>
            </div>
            <div class="signin-form">
                {!! Form::open([
                    'method' => 'post',
                    'route' => 'clients.send-pin-code'
                ]) !!}
                @if (session('message'))
                    <p class="text-danger">{{session('message')}}</p>
                @endif
                    <div class="logo">
                        <img src="{{asset('websiteAssets/imgs/logo.png')}}">
                    </div>
                    <div class="form-group">
                        {!! Form::email('email', null, [
                            'class' => 'form-control',
                            'id' => 'exampleInputEmail1',
                            'placeholder' => 'البريد الالكتروني'
                        ]) !!}
                        @error('email')
                            <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="row buttons">
                        <div class="col-md-12 center">
                            <button type="submit">ارسال الكود السري</button>
                        </div>
                    </div>
                
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection