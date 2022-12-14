
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
                        <li class="breadcrumb-item active" aria-current="page">تسجيل الدخول</li>
                    </ol>
                </nav>
            </div>
            <div class="signin-form">
                {!! Form::open([
                    'method' => 'post',
                    'route' => 'clients.login'
                ]) !!}
                    <div class="logo">
                        <img src="{{asset('websiteAssets/imgs/logo.png')}}">
                    </div>
                    <div class="form-group">
                        {!! Form::number('phone', null, [
                            'class' => 'form-control',
                            'id' => 'exampleInputEmail1',
                            'placeholder' => 'الجوال'
                        ]) !!}
                        @error('phone')
                            <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        {!! Form::password('password', [
                            'class' => 'form-control',
                            'id' => 'exampleInputPassword1',
                            'placeholder' => 'كلمة المرور'
                        ]) !!}
                        @error('password')
                            <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="row options">
                        <div class="col-md-6 remember">
                            <div class="form-group form-check">
                                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                <label class="form-check-label" for="exampleCheck1">تذكرنى</label>
                            </div>
                        </div>
                        <div class="col-md-6 forgot">
                            <img src="{{asset('websiteAssets/imgs/complain.png')}}">
                            <a href="#">هل نسيت كلمة المرور</a>
                        </div>
                    </div>
                    <div class="row buttons">
                        <div class="col-md-6 right">
                            <button type="submit">دخول</button>
                        </div>
                        <div class="col-md-6 left">
                            <a href="#">انشاء حساب جديد</a>
                        </div>
                    </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection