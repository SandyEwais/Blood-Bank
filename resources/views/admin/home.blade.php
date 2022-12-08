@inject('clients', 'App\Models\Client')
@inject('requests', 'App\Models\DonationRequest')
@extends('admin.layouts.app')
@section('page-name')
    Dashboard
@endsection
@section('content')
    <div class="row">
        <div class="col-lg-3 col-6">

            <div class="small-box bg-info">
                <div class="inner">
                    <h3>{{$clients->count()}}</h3>
                    <p>Clients</p>
                </div>
                <div class="icon">
                    <i class="ion ion-user"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <div class="col-lg-3 col-6">

            <div class="small-box bg-success">
            <div class="inner">
            <h3>{{$requests->count()}}</h3>
            <p>Donation Requests</p>
            </div>
            <div class="icon">
            <i class="ion ion-stats-bars"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
    </div>
@endsection