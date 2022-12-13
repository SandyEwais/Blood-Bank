@inject('bloodTypes', 'App\Models\BloodType')
@inject('cities', 'App\Models\City')
@extends('website.layouts.app')
@section('content')
    

    <!--intro-->
    <div class="intro">
        <div id="slider" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#slider" data-slide-to="0" class="active"></li>
                <li data-target="#slider" data-slide-to="1"></li>
                <li data-target="#slider" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item carousel-1 active">
                    <div class="container info">
                        <div class="col-lg-5">
                            <h3>بنك الدم نمضى قدما لصحة أفضل</h3>
                            <p>
                                هناك حقيقة مثبتة منذ زمن طويل وهي أن المحتوى المقروء لصفحة ما سيلهي القارئ عن التركيز على الشكل الخارجي للنص. 
                            </p>
                            <a href="#">المزيد</a>
                        </div>
                    </div>
                </div>
                <div class="carousel-item carousel-2">
                    <div class="container info">
                        <div class="col-lg-5">
                            <h3>بنك الدم نمضى قدما لصحة أفضل</h3>
                            <p>
                                هناك حقيقة مثبتة منذ زمن طويل وهي أن المحتوى المقروء لصفحة ما سيلهي القارئ عن التركيز على الشكل الخارجي للنص. 
                            </p>
                            <a href="#">المزيد</a>
                        </div>
                    </div>
                </div>
                <div class="carousel-item carousel-3">
                    <div class="container info">
                        <div class="col-lg-5">
                            <h3>بنك الدم نمضى قدما لصحة أفضل</h3>
                            <p>
                                هناك حقيقة مثبتة منذ زمن طويل وهي أن المحتوى المقروء لصفحة ما سيلهي القارئ عن التركيز على الشكل الخارجي. 
                            </p>
                            <a href="#">المزيد</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!--about-->
    <div class="about">
        <div class="container">
            <div class="col-lg-6 text-center">
                <p>
                    <span>بنك الدم</span> هناك حقيقة مثبتة منذ زمن طويل وهي أن المحتوى المقروء لصفحة ما سيلهي القارئ عن التركيز على الشكل الخارجي للنص أو شكل توضع الفقرات في الصفحة التي يقرأها. ولذلك يتم استخدام طريقة لوريم إيبسوم لأنها تعطي توزيعاَ طبيعياَ.
                </p>
            </div>
        </div>
    </div>
    
    <!--articles-->
    <div class="articles">
        <div class="container title">
            <div class="head-text">
                <h2>المقالات</h2>
            </div>
        </div>
        <div class="view">
            <div class="container">
                <div class="row">
                    <!-- Set up your HTML -->
                    <div class="owl-carousel articles-carousel">
                        @foreach ($articles as $article)
                            <div class="card">
                                <div class="photo">
                                    <img src="{{asset('websiteAssets/imgs/p2.jpg')}}" class="card-img-top" alt="...">
                                    <a href="article-details.html" class="click">المزيد</a>
                                </div>

                                    <i id="{{$article->id}}" onclick="toggleFavourite(this)" class="notfavourite far fa-heart"></i>
                                

                                <div class="card-body">
                                    <h5 class="card-title">{{$article->title}}</h5>
                                    <p class="card-text">
                                        {{Str::limit($article->content,50)}}
                                    </p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!--requests-->
    <div class="requests">
        <div class="container">
            <div class="head-text">
                <h2>طلبات التبرع</h2>
            </div>
        </div>
        <div class="content">
            <div class="container">
                <form class="row filter" action="{{route('home')}}">
                    <div class="col-md-5 blood">
                        <div class="form-group">
                            <div class="inside-select">
                                <select name="blood_type_id" class="form-control" id="exampleFormControlSelect1">
                                    <option selected disabled>اختر فصيلة الدم</option>
                                    @foreach ($bloodTypes->all() as $bloodType)
                                        <option value="{{$bloodType->id}}">{{$bloodType->name}}</option>
                                    @endforeach
                                    
                                </select>
                                <i class="fas fa-chevron-down"></i>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-5 city">
                        <div class="form-group">
                            <div class="inside-select">
                                <select name="city_id" class="form-control" id="exampleFormControlSelect1">
                                    <option selected disabled>اختر المدينة</option>
                                    @foreach ($cities->all() as $city)
                                        <option value="{{$city->id}}">{{$city->name}}</option>
                                    @endforeach
                                </select>
                                <i class="fas fa-chevron-down"></i>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-1 search">
                        <button type="submit">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </form>
                <div class="patients">
                    @foreach ($donationRequests as $donationRequest)
                        <div class="details">
                            <div class="blood-type">
                                <h2 dir="ltr">{{$donationRequest->bloodType->name}}</h2>
                            </div>
                            <ul>
                                <li><span>اسم الحالة:</span> {{$donationRequest->patient_name}}</li>
                                <li><span>مستشفى:</span> {{$donationRequest->hospital_name}}</li>
                                <li><span>المدينة:</span> {{$donationRequest->city->name}}</li>
                            </ul>
                            <a href="inside-request.html">التفاصيل</a>
                        </div>
                    @endforeach
                </div>
                <div class="more">
                    <a href="{{route('donation-requests')}}">المزيد</a>
                </div>
            </div>
        </div>
    </div>
    
    <!--contact-->
    <div class="contact">
        <div class="container">
            <div class="col-md-7">
                <div class="title">
                    <h3>اتصل بنا</h3>
                </div>
                <p class="text">يمكنك الإتصال بنا للإستفسار عن معلومة وسيتم الرد عليكم</p>
                <div class="row whatsapp">
                    <a href="#">
                        <img src="{{asset('websiteAssets/imgs/whats.png')}}">
                        <p dir="ltr">{{$settings->contact_phone}}</p>
                    </a>
                </div>
            </div>
        </div>
    </div>
    
    <!--app-->
    <div class="app">
        <div class="container">
            <div class="row">
                <div class="info col-md-6">
                    <h3>تطبيق بنك الدم</h3>
                    <p>
                        هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى،
                    </p>
                    <div class="download">
                        <h4>متوفر على</h4>
                        <div class="row stores">
                            <div class="col-sm-6">
                                <a href="#">
                                    <img src="{{asset('websiteAssets/imgs/google.png')}}">
                                </a>
                            </div>
                            <div class="col-sm-6">
                                <a href="#">
                                    <img src="{{asset('websiteAssets/imgs/ios.png')}}">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="screens col-md-6">
                    <img src="{{asset('websiteAssets/imgs/App.png')}}">
                </div>
            </div>
        </div>
    </div>
        
@endsection
@push('scripts')
    <script>
        function toggleFavourite(obj){
            var className = obj.getAttribute('class')
            if(className == 'favourite far fa-heart') {
                obj.setAttribute('class','notfavourite far fa-heart');
            } else {
                obj.setAttribute('class','favourite far fa-heart');
            }
        }
    </script>
@endpush