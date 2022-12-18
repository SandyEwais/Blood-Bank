@inject('bloodTypes', 'App\Models\BloodType');
@inject('governorates', 'App\Models\Governorate');
@inject('cities', 'App\Models\City');
@inject('model', 'App\Models\Client');
@extends('website.layouts.app',[
    'bodyClass' => 'create'
]);
@section('content')
    <!--form-->
    <div class="form">
        <div class="container">
            <div class="path">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('home')}}">الرئيسية</a></li>
                        <li class="breadcrumb-item active" aria-current="page">انشاء حساب جديد</li>
                    </ol>
                </nav>
            </div>
            <div class="account-form">
                {!! Form::model($model, [
                    'methos' => 'post',
                    'route' => 'clients.create'
                ]) !!}
                <div class="form-group">
                    {!! Form::text('name', null, [
                    'class' => 'form-control',
                    'id' => 'exampleInputEmail1',
                    'placeholder' => 'الإسم'
                    ]) !!}
                    @error('name')
                        <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>
                <div class="form-group">
                    {!! Form::email('email', null, [
                    'class' => 'form-control',
                    'id' => 'exampleInputEmail1',
                    'placeholder' => 'البريد الإلكترونى'
                    ]) !!}
                    @error('email')
                        <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>
                <div class="form-group">
                    {!! Form::text('d_o_b', null, [
                    'class' => 'form-control',
                    'id' => 'date',
                    'placeholder' => 'تاريخ الميلاد',
                    'onfocus' => 'this.type="date"'
                    ]) !!}
                    @error('d_o_b')
                        <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>
                <div class="form-group">
                    {!! Form::select('blood_type_id', ['فصيلة الدم'] + $bloodTypes->pluck('name','id')->toArray(), null, [
                    'class' => 'form-control',
                    'id' => 'blood_types',
                    ]) !!}
                    @error('blood_type_id')
                        <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>
                <div class="form-group">
                    {!! Form::select('city_id', ['المدينة'] + $cities->pluck('name','id')->toArray(), null, [
                        'class' => 'form-control',
                        'id' => 'cities',
                    ]) !!}  
                    @error('city_id')
                        <p class="text-danger">{{$message}}</p>
                    @enderror  
                </div>                    
                
                <div class="form-group">
                    {!! Form::number('phone', null, [
                    'class' => 'form-control',
                    'id' => 'exampleInputEmail1',
                    'placeholder' => 'الهاتف'
                    ]) !!}
                    @error('phone')
                        <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>
                <div class="form-group">
                    {!! Form::text('last_donation_date', null, [
                    'class' => 'form-control',
                    'id' => 'date',
                    'placeholder' => 'تاريخ اخر تبرع',
                    'onfocus' => 'this.type="date"'
                    ]) !!}
                    @error('last_donation_date')
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
                <div class="form-group">
                    {!! Form::password('password_confirmation', [
                        'class' => 'form-control',
                        'id' => 'exampleInputPassword1',
                        'placeholder' => 'تأكيد كلمة المرور'
                    ]) !!}
                    @error('password_confirmation')
                        <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>        
                    
                    <div class="create-btn">
                        <button>انساء</button>
                    </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection