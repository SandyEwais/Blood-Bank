
@extends('layouts.app')
@section('page-name')
    Clients
@endsection
@section('content')

    <!-- Default box -->
    <div class="card">
        
        <div class="card-body">
            <div class="row">
                <div class="col-md-8 offset-md-2">
                    <form action="{{route('clients.index')}}">
                        <div class="input-group">
                            <input type="search" name="search" class="form-control form-control-lg" placeholder="Type your keywords here">
                            <div class="input-group-append">
                                <button type="submit" class="btn btn-lg btn-default">
                                    <i class="fa fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            
            @if (session('message'))
            <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h5><i class="icon fas fa-check"></i> Successt!</h5>
                    {{session('message')}}
                </div>
            @endif
            @if (count($clients))
            <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
               <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Phone</th>
                        <th>Email</th>
                        <th>Blood Type</th>
                        <th>Birth date</th>
                        <th>City</th>
                        <th>Last Donation Date</th>
                        <th>Delete</th>
                    </tr>
               </thead>
                <tbody>
                    @foreach ($clients as $client)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$client->name}}</td>
                            <td>{{$client->phone}}</td>
                            <td>{{$client->email}}</td>
                            <td>{{$client->bloodType->name}}</td>
                            <td>{{$client->d_o_b}}</td>
                            <td>{{$client->city->name}}</td>
                            <td>{{$client->last_donation_date}}</td>
                            <td>
                                {!! Form::open([
                                    'route' => ['clients.destroy',$client->id],
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
            @endif
        </div>
      </div>
      <!-- /.card -->
@endsection