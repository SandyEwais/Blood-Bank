@inject('clients', 'App\Models\Client')
@inject('requests', 'App\Models\DonationRequest')
@extends('layouts.app')
@section('page-name')
    Governorates
@endsection
@section('content')
    <!-- Default box -->
    <div class="card">
        <div class="card-body">
            @if (count($governorates))
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
                            <td>11-7-2014</td>
                            <td>11-7-2014</td>
                        </tr>
                    @endforeach
                    
                </tbody>
               </table>
               </div>
            @else
                <div class="alert alert-warning" role="alert">No Data Has Been Founded</div>
            @endif
        </div>
      </div>
      <!-- /.card -->
@endsection