
@extends('admin.layouts.app')
@section('page-name')
    Governorates
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
            
            @if (count($governorates))
            <a class="btn btn-info" href="{{route('governorates.create')}}"><i class="fa fa-plus"></i> New Governorate</a>
            <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                    <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                    </thead>
                    <tbody>
                        @foreach ($governorates as $governorate)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$governorate->name}}</td>
                                <td>
                                    <a class="btn btn-secondary btn-sm" href="{{route('governorates.edit',['governorate' => $governorate->id])}}"><i class="fa fa-edit"></i> Edit</a>
                                </td>
                                <td>
                                    {!! Form::open([
                                        'route' => ['governorates.destroy',$governorate->id],
                                        'method' => 'delete'
                                    ]) !!}
                                    {!! Form::button('<i class="fas fa-trash-alt"></i> Delete', ['class' => 'btn btn-danger btn-sm', 'type' => 'submit']) !!}
                                    {!! Form::close() !!}
                                </td>
                            </tr>
                        @endforeach
                        
                    </tbody>
               </table>
            </div>
            @else
                <div class="alert alert-warning alert-dismissible">
                    <h5><i class="icon fas fa-exclamation-triangle"></i> No data found</h5>
                </div>
                <a class="btn btn-info" href="{{route('governorates.create')}}"><i class="fa fa-plus"></i> New Governorate</a>
            @endif
        </div>
      </div>
      <!-- /.card -->
@endsection