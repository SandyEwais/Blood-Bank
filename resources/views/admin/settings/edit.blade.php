
@extends('admin.layouts.app')
@section('page-name')
    Edit Settings
@endsection
@section('content')
    <!-- Default box -->
    <div class="card">
        <div class="card-body">
            {!! Form::model($settings, [
                'route' => ['settings.update',$settings->id],
                'method' => 'put'
            ]) !!}
            <div class="form-group">
                {!! Form::label('aboutus_text', 'About Us Text') !!}
                {!! Form::textarea('aboutus_text', null,[
                    'class' => 'form-control'
                ]) !!}
                @error('aboutus_text')
                    <p class="text-danger">{{$message}}</p>
                @enderror
            </div>
            <div class="form-group">
                {!! Form::label('notification_settings_text', 'Notification Settings Text') !!}
                {!! Form::textarea('notification_settings_text', null,[
                    'class' => 'form-control'
                ]) !!}
                @error('notification_settings_text')
                    <p class="text-danger">{{$message}}</p>
                @enderror
            </div>
            <div class="form-group">
                {!! Form::label('contact_phone', 'Contact Phone') !!}
                {!! Form::number('contact_phone', null,[
                    'class' => 'form-control'
                ]) !!}
                @error('contact_phone')
                    <p class="text-danger">{{$message}}</p>
                @enderror
            </div>
            <div class="form-group">
                {!! Form::label('contact_email', 'Contact Email') !!}
                {!! Form::email('contact_email', null,[
                    'class' => 'form-control'
                ]) !!}
                @error('contact_email')
                    <p class="text-danger">{{$message}}</p>
                @enderror
            </div>
            <div class="form-group">
                {!! Form::label('fb_link', 'Facebook Link') !!}
                {!! Form::url('fb_link', null,[
                    'class' => 'form-control'
                ]) !!}
                @error('fb_link')
                    <p class="text-danger">{{$message}}</p>
                @enderror
            </div>
            <div class="form-group">
                {!! Form::label('tw_link', 'Twitter Link') !!}
                {!! Form::url('tw_link', null,[
                    'class' => 'form-control'
                ]) !!}
                @error('tw_link')
                    <p class="text-danger">{{$message}}</p>
                @enderror
            </div>
            <div class="form-group">
                {!! Form::label('insta_link', 'Instagram Link') !!}
                {!! Form::url('insta_link', null,[
                    'class' => 'form-control'
                ]) !!}
                @error('insta_link')
                    <p class="text-danger">{{$message}}</p>
                @enderror
            </div>
            <div class="form-group">
                {!! Form::label('youtube_link', 'Youtube Link') !!}
                {!! Form::url('youtube_link', null,[
                    'class' => 'form-control'
                ]) !!}
                @error('youtube_link')
                    <p class="text-danger">{{$message}}</p>
                @enderror
            </div>
            
            
            <div class="form-group">
                {!! Form::submit('Submit', [
                    'class' => 'btn btn-info'
                ]) !!}
            </div>
            </div>
            {!! Form::close() !!}
            
        </div>
      </div>
      <!-- /.card -->
@endsection