@inject('model', 'Spatie\Permission\Models\Role')
@inject('permissions', 'Spatie\Permission\Models\Permission')
@extends('layouts.app')
@section('page-name')
    Create New Role
@endsection
@section('content')
    <!-- Default box -->
    <div class="card">
        <div class="card-body">
            {!! Form::model($model, [
                'route' => 'roles.store'
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
                        {!! Form::checkbox('permissions[]', $permission->id, '',[
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