
@inject('bloodTypes', 'App\Models\BloodType')
@inject('governorates', 'App\Models\Governorate')
@extends('website.layouts.app',[
    'bodyClass' => 'who-are-us'
])
@section('content')
<div class="container rounded bg-white mt-5 mb-5">
    
    <div class="row">
        <div class="col-md-12 border-right">
            <div class="p-3">
                <div class="container title mb-4 d-flex justify-content-center align-items-center">
                    <div class="head-text">
                        <h2>إعدادات الإشعارات</h2>
                    </div>
                </div>
                @if (session('message'))
                    <div class="alert alert-success" role="alert" id="successMsg" style="display: none" >
                        {{session('message')}}
                    </div>
                @endif
                {!! Form::model($settings,[
                    'method' => 'post',
                    'route' => 'save-settings'
                ]) !!}
                
                    <div class="row mt-2">
                        @foreach ($bloodTypes->all() as $bloodType)
                            <div class="col-md-6">
                                {!! Form::label('blood_type_id', $bloodType->name, ['class' => 'labels']) !!}
                                {!! Form::checkbox('blood_type_id[]', $bloodType->id, in_array($bloodType->id, $selected_blood_types) ? 'checked' : '', []) !!}
                            </div>
                            
                        @endforeach
                        @foreach ($governorates->all() as $governorate)
                            <div class="col-md-6">
                                {!! Form::label('governorate_id', $governorate->name, ['class' => 'labels']) !!}
                                {!! Form::checkbox('governorate_id[]', $governorate->id, in_array($governorate->id, $selected_governorates) ? 'checked' : '', []) !!}
                            </div>
                        @endforeach
                    </div>
                
                    
                    
                    <div class="mt-5 text-center">
                        <button class="btn btn-primary profile-button" type="submit">Save Settings</button>
                    </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
@endsection

