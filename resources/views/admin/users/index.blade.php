
@extends('layouts.app')
@section('page-name')
    Users
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
            
            @if (count($users))
            <a class="btn btn-info" href="{{route('users.create')}}"><i class="fa fa-plus"></i> New user</a>
            <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
               <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Activate</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
               </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$user->name}}</td>
                            <td>
                                <div class="form-group">
                                    <form method="POST" action="{{route('activate',$user->id)}}">
                                        @csrf
                                        @if ($user->is_active == 0)
                                        <button name="is_active" value="1" type="submit" class="btn btn-success">Activate</button>
                                        @else
                                        <button name="is_active" value="0" type="submit" class="btn btn-danger">Deactivate</button>
                                        @endif
                                    </form>
                                </div>
                            </td>
                            <td>
                                <a class="btn btn-secondary btn-sm" href="{{route('users.edit',['user' => $user->id])}}"><i class="fa fa-edit"></i> Edit</a>
                            </td>
                            <td>
                                {!! Form::open([
                                    'route' => ['users.destroy',$user->id],
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
                <a class="btn btn-info" href="{{route('users.create')}}"><i class="fa fa-plus"></i> New user</a>
            @endif
        </div>
      </div>
      <!-- /.card -->
@endsection