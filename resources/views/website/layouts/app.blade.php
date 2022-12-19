<!doctype html>
<html lang="en" dir="rtl">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://cdn.rtlcss.com/bootstrap/v4.2.1/css/bootstrap.min.css" integrity="sha384-vus3nQHTD+5mpDiZ4rkEPlnkcyTP+49BhJ4wJeJunw06ZAp+wzzeBPUXr42fi8If" crossorigin="anonymous">
        
        <!--google fonts css-->
        <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;600;700&display=swap" rel="stylesheet">
        
        <!--font awesome css-->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">
        <link rel="icon" href="{{asset('websiteAssets/imgs/Icon.png')}}">
        
        <!--owl-carousel css-->
        <link rel="stylesheet" href="{{asset('websiteAssets/css/owl.carousel.min.css')}}">
        <link rel="stylesheet" href="{{asset('websiteAssets/css/owl.theme.default.min.css')}}">
        
        <!--style css-->
        <link rel="stylesheet" href="{{asset('websiteAssets/css/style.css')}}">
        
        <title>Blood Bank</title>
    </head>
    <body class="{{$bodyClass ?? ""}}">

        <!--upper-bar-->
        <div class="upper-bar">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-6">
                        <div class="language">
                            <a href="index.html" class="ar active">عربى</a>
                            <a href="index-ltr.html" class="en inactive">EN</a>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="social">
                            <div class="icons">
                                <a href="{{$settings->fb_link}}" class="facebook"><i class="fab fa-facebook-f"></i></a>
                                <a href="{{$settings->insta_link}}" class="instagram"><i class="fab fa-instagram"></i></a>
                                <a href="{{$settings->tw_link}}" class="twitter"><i class="fab fa-twitter"></i></a>
                                <a href="{{$settings->youtube_link}}" class="youtube"><i class="fab fa-youtube"></i></a>
                            </div>
                        </div>
                    </div>
                    
                    
                    <div class="col-lg-4">
                        <!-- not a member-->
                    @guest('web-clients')
                        <div class="info" dir="ltr">
                            <div class="phone">
                                <i class="fas fa-phone-alt"></i>
                                <p>{{$settings->contact_phone}}</p>
                            </div>
                            <div class="e-mail">
                                <i class="far fa-envelope"></i>
                                <p>{{$settings->contact_email}}</p>
                            </div>
                        </div>
                    @endguest

                    <!--I'm a member -->
                    @auth('web-clients')
                        <div class="member">
                                <p class="welcome">مرحباً بك</p>
                                <div class="dropdown">
                                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        {{Auth::guard('web-clients')->user()->name}}
                                        <i class="fas fa-chevron-down"></i>
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <a class="dropdown-item" href="{{route('home')}}">
                                            <i class="fas fa-home"></i>
                                            الرئيسية
                                        </a>
                                        <a class="dropdown-item" href="{{route('profile',['client' => Auth::guard('web-clients')->user()->id])}}">
                                            <i class="far fa-user"></i>
                                            معلوماتى
                                        </a>
                                        <a class="dropdown-item" href="{{route('settings',['client' => Auth::guard('web-clients')->user()->id])}}">
                                            <i class="far fa-bell"></i>
                                            اعدادات الاشعارات
                                        </a>
                                        <a class="dropdown-item" href="{{route('favourites')}}">
                                            <i class="far fa-heart"></i>
                                            المفضلة
                                        </a>
                                        <a class="dropdown-item" href="{{route('contact-us')}}">
                                            <i class="fas fa-phone-alt"></i>
                                            تواصل معنا
                                        </a>
                                        
                                        <button data-toggle="modal" data-target="#exampleModalCenter" class="dropdown-item">
                                            <i class="fas fa-sign-out-alt"></i>
                                            تسجيل الخروج
                                        </button>
                                        
                                    </div>
                                </div>
                            </div>
                        
                    @endauth

                    </div>
                </div>
            </div>
        </div>
        
        
        <!--nav-->
        <div class="nav-bar">
            <nav class="navbar navbar-expand-lg navbar-light">
                <div class="container">
                    <a class="navbar-brand" href="#">
                        <img src="{{asset('websiteAssets/imgs/logo.png')}}" class="d-inline-block align-top" alt="">
                    </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav">
                            <li class="nav-item {{Route::current()->getName() == 'home' ? 'active' : ''}}">
                                <a class="nav-link" href="{{route('home')}}">الرئيسية <span class="sr-only">(current)</span></a>
                            </li>
                            <li class="nav-item {{Route::current()->getName() == 'about' ? 'active' : ''}}">
                                <a class="nav-link" href="{{route('about-blood-bank')}}">عن بنك الدم</a>
                            </li>
                            <li class="nav-item {{Route::current()->getName() == 'articles' ? 'active' : ''}}">
                                <a class="nav-link" href="{{route('articles')}}">المقالات</a>
                            </li>
                            <li class="nav-item {{Route::current()->getName() == 'donation-requests' ? 'active' : ''}}">
                                <a class="nav-link" href="{{route('donation-requests')}}">طلبات التبرع</a>
                            </li>
                            <li class="nav-item {{Route::current()->getName() == 'about-us' ? 'active' : ''}}">
                                <a class="nav-link" href="{{route('about-us')}}">من نحن</a>
                            </li>
                            <li class="nav-item {{Route::current()->getName() == 'contact-us' ? 'active' : ''}}">
                                <a class="nav-link" href="{{route('contact-us')}}">اتصل بنا</a>
                            </li>
                        </ul>
                        
                        <!-- not a member -->
                        @guest('web-clients')
                            <div class="accounts">
                                <a href="{{route('clients.register')}}" class="create">إنشاء حساب جديد</a>
                                <a href="{{route('clients.login')}}" class="signin">الدخول</a>
                            </div>
                        @endguest
                        
                        
                        {{-- I'm a member --}}
                        @auth('web-clients')
                            <a href="#" class="donate">
                                <img src="{{asset('websiteAssets/imgs/transfusion.svg')}}">
                                <p>طلب تبرع</p>
                            </a>
                        @endauth
                        

                         
                        
                    </div>
                </div>
            </nav>
        </div>
        {{-- Start Content --}}
        <!-- Modal -->
        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">تسجيل خروج</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body">
                هل أنت متأكد ؟
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-light" data-dismiss="modal">الغاء</button>
                {!! Form::open([
                    'method' => 'post',
                    'route' => 'clients.logout'
                ]) !!}
                <button type="submit" class="btn btn-secondary">نعم</button>
                {!! Form::close() !!}
                </div>
            </div>
            </div>
        </div>
        @yield('content')
        {{-- End Content --}}

        <!--footer-->
        <div class="footer">
            <div class="inside-footer">
                <div class="container">
                    <div class="row">
                        <div class="details col-md-4">
                            <img src="{{asset('websiteAssets/imgs/logo.png')}}">
                            <h4>بنك الدم</h4>
                            <p>
                                هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى، حيث يمكنك أن تولد مثل هذا النص أو العديد من النصوص الأخرى إضافة إلى.
                            </p>
                        </div>
                        <div class="pages col-md-4">
                            <div class="list-group" id="list-tab" role="tablist">
                                <a class="list-group-item list-group-item-action {{Route::current()->getName() == 'home' ? 'active' : ''}}" id="list-home-list" href="{{route('home')}}" role="tab" aria-controls="home">الرئيسية</a>
                                <a class="list-group-item list-group-item-action {{Route::current()->getName() == 'about' ? 'active' : ''}}" id="list-profile-list" href="{{route('about-blood-bank')}}" role="tab" aria-controls="profile">عن بنك الدم</a>
                                <a class="list-group-item list-group-item-action {{Route::current()->getName() == 'articles' ? 'active' : ''}}" id="list-messages-list" href="{{route('articles')}}" role="tab" aria-controls="messages">المقالات</a>
                                <a class="list-group-item list-group-item-action {{Route::current()->getName() == 'donation-requests' ? 'active' : ''}}" id="list-settings-list" href="{{route('donation-requests')}}" role="tab" aria-controls="settings">طلبات التبرع</a>
                                <a class="list-group-item list-group-item-action {{Route::current()->getName() == 'about-us' ? 'active' : ''}}" id="list-settings-list" href="{{route('about-us')}}" role="tab" aria-controls="settings">من نحن</a>
                                <a class="list-group-item list-group-item-action {{Route::current()->getName() == 'contact-us' ? 'active' : ''}}" id="list-settings-list" href="{{route('contact-us')}}" role="tab" aria-controls="settings">اتصل بنا</a>
                            </div>
                        </div>
                        <div class="stores col-md-4">
                            <div class="availabe">
                                <p>متوفر على</p>
                                <a href="#">
                                    <img src="{{asset('websiteAssets/imgs/google1.png')}}">
                                </a>
                                <a href="#">
                                    <img src="{{asset('websiteAssets/imgs/ios1.png')}}">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="other">
                <div class="container">
                    <div class="row">
                        <div class="social col-md-4">
                            <div class="icons">
                                <a href="{{$settings->fb_link}}" class="facebook"><i class="fab fa-facebook-f"></i></a>
                                <a href="{{$settings->insta_link}}" class="instagram"><i class="fab fa-instagram"></i></a>
                                <a href="{{$settings->tw_link}}" class="twitter"><i class="fab fa-twitter"></i></a>
                                <a href="{{$settings->youtube_link}}" class="youtube"><i class="fab fa-youtube"></i></a>
                            </div>
                        </div>
                        <div class="rights col-md-8">
                            <p>جميع الحقوق محفوظة لـ <span>بنك الدم</span> &copy; 2019</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Optional JavaScript -->
        <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?sensor=false&libraries=places"></script>

        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        {{-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script> --}}
        <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
        <script src="{{asset('websiteAssets/js/bootstrap.bundle.js')}}"></script>
        <script src="{{asset('websiteAssets/js/bootstrap.bundle.min.js')}}"></script>
      
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
      
        <script src="https://cdn.rtlcss.com/bootstrap/v4.2.1/js/bootstrap.min.js" integrity="sha384-a9xOd0rz8w0J8zqj1qJic7GPFfyMfoiuDjC9rqXlVOcGO/dmRqzMn34gZYDTel8k" crossorigin="anonymous"></script>
        
        <script src="{{asset('websiteAssets/js/owl.carousel.min.js')}}"></script>
        
        <script src="{{asset('websiteAssets/js/main.js')}}"></script>

        @stack('scripts')
        <script>
            function showConfirmBox() {
                document.getElementById("overlay").hidden = false;
            }
            function closeConfirmBox() {
                document.getElementById("overlay").hidden = true;
            }

            function isConfirm(answer) {
                if (answer) {
                alert("Answer is yes");
                } else {
                alert("Answer is no");
                }
                closeConfirmBox();
            }
        </script>
        
    </body>
</html>