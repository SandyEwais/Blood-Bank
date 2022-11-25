@extends('layouts.app')
@section('page-name')
    Settings
@endsection
@section('content')
    <div class="card-body">
        <dl>
            <dt>About Us:</dt>
            <dd>{{$settings->aboutus_text}}</dd>
            <dt>About Notification Settings:</dt>
            <dd>{{$settings->notification_settings_text}}</dd>
        </dl>
        <dl class="row">
            <dt class="col-sm-2">Contact Phone:</dt>
            <dd class="col-sm-10">{{$settings->contact_phone}}</dd>
            <dt class="col-sm-2">Contact Email:</dt>
            <dd class="col-sm-10">{{$settings->contact_email}}</dd>
            <dt class="col-sm-2">Facebook Link:</dt>
            <dd class="col-sm-10">{{$settings->fb_link}}</dd>
            <dt class="col-sm-2">Twitter Link:</dt>
            <dd class="col-sm-10">{{$settings->tw_link}}</dd>
            <dt class="col-sm-2">Instagram Link:</dt>
            <dd class="col-sm-10">{{$settings->insta_link}}</dd>
            <dt class="col-sm-2">Youtube Link:</dt>
            <dd class="col-sm-10">{{$settings->youtube_link}}</dd>
        </dl>
        <a class="btn btn-info" href="{{route('settings.edit',['setting' => $settings->id])}}"><i class="fa fa-edit"></i> Edit</a>
    </div>
@endsection