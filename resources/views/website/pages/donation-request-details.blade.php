@extends('website.layouts.app',[
    'bodyClass' => 'inside-request'
])
@section('content')
    <div class="ask-donation">
        <div class="container">
            <div class="path">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">الرئيسية</a></li>
                        <li class="breadcrumb-item"><a href="donation-requests.html">طلبات التبرع</a></li>
                        <li class="breadcrumb-item active" aria-current="page">طلب التبرع: {{$donationRequest->patient_name}}</li>
                    </ol>
                </nav>
            </div>
            <div class="details">
                <div class="person">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="inside">
                                <div class="info">
                                    <div class="dark">
                                        <p>الإسم</p>
                                    </div>
                                    <div class="light">
                                        <p>{{$donationRequest->patient_name}}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="inside">
                                <div class="info">
                                    <div class="dark">
                                        <p>فصيلة الدم</p>
                                    </div>
                                    <div class="light">
                                        <p dir="ltr">{{$donationRequest->bloodType->name}}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="inside">
                                <div class="info">
                                    <div class="dark">
                                        <p>العمر</p>
                                    </div>
                                    <div class="light">
                                        <p>{{$donationRequest->patient_age}} عام</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="inside">
                                <div class="info">
                                    <div class="dark">
                                        <p>عدد الأكياس المطلوبة</p>
                                    </div>
                                    <div class="light">
                                        <p>{{$donationRequest->blood_bags}} أكياس</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="inside">
                                <div class="info">
                                    <div class="dark">
                                        <p>المشفى</p>
                                    </div>
                                    <div class="light">
                                        <p>{{$donationRequest->hospital_name}}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="inside">
                                <div class="info">
                                    <div class="dark">
                                        <p>رقم الجوال</p>
                                    </div>
                                    <div class="light">
                                        <p>{{$donationRequest->patient_phone}}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="inside">
                                <div class="info">
                                    <div class="special-dark dark">
                                        <p>عنوان المشفى</p>
                                    </div>
                                    <div class="special-light light">
                                        <p>{{$donationRequest->city->name . ' ،' . $donationRequest->governorate->name}}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="details-button">
                        <p>تفاصيل إضافية</p>
                    </div>
                </div>
                <div class="text">
                    <p>{{$donationRequest->details ? $donationRequest->details : 'لا يوجد'}}</p>
                </div>
                <div class="location">
                    <div id="map" style="width: 100%; height: 300px;"></div> 
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
<script>
function showMap(latitude,lognitude){
    var coord = {lat: latitude, lng: lognitude}
    var map = new google.maps.Map(
        document.getElementById('map'),
        {
            zoom: 10,
            center: coord
        }
    );
    new google.maps.Marker({
        position: coord,
        map: map
    });
}
showMap({{$donationRequest->latitude}},{{$donationRequest->lognitude}});
</script>
@endpush
