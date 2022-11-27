@inject('user', 'App\Models\User')
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Login</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('adminLte/plugins/fontawesome-free/css/all.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('adminLte/dist/css/adminlte.min.css')}}">
</head>
<body class="hold-transition sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">
        <div class="card-body d-flex justify-content-center">
            <div class="card card-row card-default">
                <div class="card-header bg-info">   
                    <h3 class="card-title">
                    Login
                    </h3>
                </div>
                <div class="card-body">
                    <div class="card card-light card-outline">
                    <div class="card-body">
                        {!! Form::model($user, [
                            'route' => 'authenticate'
                        ]) !!}
                        <div class="form-group">
                            {!! Form::label('email', 'Email') !!}
                            {!! Form::email('email', null,[
                                'class' => 'form-control'
                            ]) !!}
                            @error('email')
                                <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            {!! Form::label('password', 'Password') !!}
                            {!! Form::password('password', null,[
                                'class' => 'form-control'
                            ]) !!}
                            @error('password')
                                <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            {!! Form::submit('Submit', [
                                'class' => 'btn btn-info'
                            ]) !!}
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>


    </div>
    <!-- ./wrapper -->
    
    <!-- jQuery -->
    <script src="{{asset('adminLte/plugins/jquery/jquery.min.js')}}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{asset('adminLte/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <!-- AdminLTE App -->
    <script src="{{asset('adminLte/dist/js/adminlte.min.js')}}"></script>
    </body>
    </html>



