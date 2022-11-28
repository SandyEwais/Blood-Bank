@inject('permissions', 'Spatie\Permission\Models\Permission')
@extends('layouts.app')
@section('page-name')
    Edit Role
@endsection
@section('content')
    <!-- Default box -->
    <div class="card">
        <div class="card-body">
            @if (session('message'))
            <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h5><i class="icon fas fa-check"></i> Successt!</h5>
                    {{session('message')}}
                </div>
            @endif
            {!! Form::model($role, [
                'route' => ['roles.update',$role->id],
                'method' => 'put'
            ]) !!}
            <div class="form-group">
                {!! Form::label('name', 'Name') !!}
                {!! Form::text('name', null,[
                    'class' => 'form-control'
                ]) !!}
                @error('name')
                    <p class="text-danger">{{$message}}</p>
                @enderror
            </div>
            
            {!! Form::label('', 'Permissions:') !!}
            {!! Form::checkbox('', '', '',[
                'id' => 'selectAll'
            ]) !!}{{' Select All'}}
            @error('permissions')
            <p class="text-danger">{{$message}}</p>
            @enderror
                <div class="row">
                    @foreach ($permissions->all() as $permission)
                    <div class="col-sm-3">
                        {!! Form::checkbox('permissions[]', $permission->id, 
                        $role->hasPermissionTo($permission->name) ? 'check' : ''
                        ,[
                            'class' => 'checkbox'
                        ]) !!}{{' '.$permission->name}}<br>
                    </div>
                    @endforeach
                </div>
            
            <br>
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
@push('selectAll')
    <script>
        $("#selectAll").click(function() {
            $("input[type=checkbox]").prop("checked", $(this).prop("checked"));
        });
        $("input[type=checkbox]").click(function() {
        if (!$(this).prop("checked")) {
            $("#selectAll").prop("checked", false);
        }
        });
    </script>
@endpush