
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
                        <li class="breadcrumb-item active" aria-current="page">تأكيد كلمة المرور الجديدة</li>
                    </ol>
                </nav>
            </div>
            <div class="signin-form">
                {!! Form::open([
                    'method' => 'post',
                    'route' => 'clients.confirm-pin-code'
                ]) !!}
                
                    <div class="logo">
                        <img src="{{asset('websiteAssets/imgs/logo.png')}}">
                    </div>
                    @if (session('message'))
                        <p class="text-danger">{{session('message')}}</p>
                    @endif
                    <div class="form-group">
                        {!! Form::number('pin_code', null, [
                            'class' => 'form-control',
                            'id' => 'exampleInputPassword1',
                            'placeholder' => 'الكود السري'
                        ]) !!}
                        @error('pin_code')
                            <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        {!! Form::password('password', [
                            'class' => 'form-control',
                            'id' => 'exampleInputPassword1',
                            'placeholder' => 'كلمة المرور الجديدة'
                        ]) !!}
                        @error('password')
                            <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        {!! Form::password('password_confirmation', [
                            'class' => 'form-control',
                            'id' => 'exampleInputPassword1',
                            'placeholder' => 'تأكيد كلمة المرور الجديدة'
                        ]) !!}
                        @error('password_confirmation')
                            <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="row buttons">
                        <div class="col-md-12 center">
                            <button type="submit">تأكيد</button>
                        </div>
                    </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection