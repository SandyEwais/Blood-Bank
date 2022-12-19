@inject('cities', 'App\Models\City')
@inject('bloodTypes', 'App\Models\BloodType')
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
                        <h2>معلوماتي</h2>
                    </div>
                </div>
                <div class="alert alert-success" role="alert" id="successMsg" style="display: none" >
                    تم التحديث بنجاح !
                </div>
                {!! Form::model($client,[
                    'id' => 'profileForm'
                ]) !!}
                    <div class="row mt-2">
                        <div class="col-md-12">
                            {!! Form::label('name', 'الإسم', ['class' => 'labels']) !!}
                            {!! Form::text('name', null, ['class' => 'form-control mb-2','id' => 'name']) !!}
                            <span class="text-danger" id="nameErrorMsg"></span>
                        </div>
                        
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-6">
                            {!! Form::label('phone', 'رقم التليفون', ['class' => 'labels']) !!}
                            {!! Form::text('phone', null, ['class' => 'form-control mb-2','id' => 'phone']) !!}
                            <span class="text-danger" id="phoneErrorMsg"></span>
                        </div>
                        <div class="col-md-6">
                            {!! Form::label('email', 'البريد الإلكتروني', ['class' => 'labels']) !!}
                            {!! Form::text('email', null, ['class' => 'form-control mb-2','id' => 'email']) !!}
                            <span class="text-danger" id="emailErrorMsg"></span>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-6">
                            {!! Form::label('d_o_b', 'تاريخ الميلاد', ['class' => 'labels']) !!}
                            {!! Form::date('d_o_b', null, ['class' => 'form-control mb-2','id' => 'd_o_b']) !!}
                            <span class="text-danger" id="birthDateErrorMsg"></span>
                        </div>
                        <div class="col-md-6">
                            {!! Form::label('blood_type_id', 'فصيلة الدم', ['class' => 'labels']) !!}
                            {!! Form::select('blood_type_id', $bloodTypes->pluck('name','id')->toArray(), null, ['class' => 'form-control mb-2','id' => 'blood_type_id']) !!}
                            <span class="text-danger" id="bloodTypeErrorMsg"></span>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-6">
                            {!! Form::label('last_donation_date', 'تاريخ أخر تبرع بالدم', ['class' => 'labels']) !!}
                            {!! Form::date('last_donation_date', null, ['class' => 'form-control mb-2','id' => 'last_donation_date']) !!}
                            <span class="text-danger" id="lastDonationDateErrorMsg"></span>
                        </div>
                        <div class="col-md-6">
                            {!! Form::label('city_id', 'المدينة', ['class' => 'labels']) !!}
                            {!! Form::select('city_id', $cities->pluck('name','id')->toArray(), null, ['class' => 'form-control mb-2','id' => 'city_id']) !!}
                            <span class="text-danger" id="cityErrorMsg"></span>
                        </div>
                    </div>
                    <div class="mt-5 text-center">
                        <button class="btn btn-primary profile-button" type="submit">Save Profile</button>
                    </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
@endsection
@push('scripts')
<script type="text/javascript">

    $('#profileForm').on('submit',function(e){
        e.preventDefault();
    
        let name = $('#name').val();
        let email = $('#email').val();
        let phone = $('#phone').val();
        let d_o_b = $('#d_o_b').val();
        let blood_type_id = $('#blood_type_id').val();
        let city_id = $('#city_id').val();
        let last_donation_date = $('#last_donation_date').val();
        
        $.ajax({
          url: "{{route('save-profile')}}",
          type:"POST",
          data:{
            _token: "{{ csrf_token() }}",
            name: name,
            email: email,
            phone: phone,
            d_o_b: d_o_b,
            blood_type_id: blood_type_id,
            city_id: city_id,
            last_donation_date: last_donation_date
          },
          success:function(response){
            $('#successMsg').show();
            console.log(response);
        },
        error: function(response) {
            $('#nameErrorMsg').text(response.responseJSON.errors.name);
            $('#emailErrorMsg').text(response.responseJSON.errors.email);
            $('#phoneErrorMsg').text(response.responseJSON.errors.mobile);
            $('#birthDateErrorMsg').text(response.responseJSON.errors.message);
            $('#lastDonationDateErrorMsg').text(response.responseJSON.errors.message);
            $('#cityErrorMsg').text(response.responseJSON.errors.message);
            $('#bloodTypeErrorMsg').text(response.responseJSON.errors.message);
        },
          });
        });
      </script>
@endpush
