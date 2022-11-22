
@extends('layouts.app')
@section('page-name')
    articles
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
            <a class="btn btn-info" href="{{route('articles.create')}}"><i class="fa fa-plus"></i> New article</a>
            @if (count($articles))
            <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
               <thead>
                    <tr>
                        <th>#</th>
                        <th>Title</th>
                        <th>Content</th>
                        <th>Category</th>
                        <th>View</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
               </thead>
                <tbody>
                    @foreach ($articles as $article)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$article->title}}</td>
                            <td>{{$article->content}}</td>
                            <td>{{$article->category->name}}</td>
                            <td>
                                <a class="btn btn-info btn-sm" href="{{route('articles.show',['article' => $article->id])}}"><i class="fa fa-eye"></i> View</a>
                            </td>
                            <td>
                                <a class="btn btn-info btn-sm" href="{{route('articles.edit',['article' => $article->id])}}"><i class="fa fa-edit"></i> Edit</a>
                            </td>
                            <td>
                                {!! Form::open([
                                    'route' => ['articles.destroy',$article->id],
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