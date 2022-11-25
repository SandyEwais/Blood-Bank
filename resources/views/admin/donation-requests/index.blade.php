
@extends('layouts.app')
@section('page-name')
    Donation Requests
@endsection
@section('content')
    <!-- Default box -->
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-8 offset-md-2">
                    <form action="{{route('donation-requests.index')}}">
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
            @if (count($donationRequests))
            <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
               <thead>
                    <tr>
                        <th>Blood Type</th>
                        <th>Blood Bags</th>
                        <th>Hospital</th>
                        <th>Governorate</th>
                        <th>Client</th>
                        <th>View</th>
                        <th>Delete</th>
                    </tr>
               </thead>
                <tbody>
                    @foreach ($donationRequests as $donationRequest)
                        <tr>
                            <td>{{$donationRequest->bloodType->name}}</td>
                            <td>{{$donationRequest->blood_bags}}</td>
                            <td>{{$donationRequest->hospital_name}}</td>
                            <td>{{$donationRequest->governorate->name}}</td>
                            <td>
                                <a class="link-info" href="{{route('donation-requests.index',['search' => $donationRequest->client->email])}}">{{$donationRequest->client->phone}}</a>
                            </td>
                            <td>
                                <a class="btn btn-info btn-sm" href="{{route('donation-requests.show',['donation_request' => $donationRequest->id])}}"><i class="fa fa-eye"></i> View</a>
                            </td>
                            <td>
                                {!! Form::open([
                                    'route' => ['donation-requests.destroy',$donationRequest->id],
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
      {{ $donationRequests->links() }}
      
@endsection