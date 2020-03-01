@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @include('layouts.sidebar')
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">Manage Category</div>
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <table class="table table-bordered bg-light">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Category Name</th>
                                <th scope="col">Category Descriptions</th>
                                <th scope="col">Publication Status</th>
                                <th scope="col">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php($i=1)
                            @foreach($category as $categories)
                                @if(Auth::user()->role==1)
                                <tr>
                                    <th scope="row">{{$i++}}</th>
                                    <td>{{$categories->category_name}}</td>
                                    <td>{{$categories->category_description}}</td>
                                    <td>{{$categories->publication_status==1?'published':'unpublished'}}</td>
                                    <td>
                                        @if($categories->publication_status==1)
                                            <a href="{{route('unpublished-category',['id'=>$categories->id])}}" class="btn btn-primary">
                                                <i class="fa fa-arrow-up" aria-hidden="true"></i>
                                            </a>
                                        @else
                                            <a href="{{route('published-category',['id'=>$categories->id])}}" class="btn btn-secondary">
                                                <i class="fa fa-arrow-down"aria-hidden="true"></i>
                                            </a>
                                        @endif
                                        <a href="{{route('edit-category',['id'=>$categories->id])}}" class="btn btn-warning">
                                            <i class="fa fa-edit"aria-hidden="true"></i>
                                        </a>

                                        <a href="{{route('delete-category',['id'=>$categories->id])}}" onclick="return confirm('are you sure?')" class="btn btn-danger">
                                            <i class="fa fa-trash"aria-hidden="true"></i>
                                        </a>
                                    </td>
                                </tr>
                                @elseif($categories->user_id == Auth::user()->id)
                                    <tr>
                                        <th scope="row">{{$i++}}</th>
                                        <td>{{$categories->category_name}}</td>
                                        <td>{{$categories->category_description}}</td>
                                        <td>{{$categories->publication_status==1?'published':'unpublished'}}</td>
                                        <td>
                                            @if($categories->publication_status==1)
                                                <a href="{{route('unpublished-category',['id'=>$categories->id])}}" class="btn btn-primary">
                                                    <i class="fa fa-arrow-up" aria-hidden="true"></i>
                                                </a>
                                            @else
                                                <a href="{{route('published-category',['id'=>$categories->id])}}" class="btn btn-secondary">
                                                    <i class="fa fa-arrow-down"aria-hidden="true"></i>
                                                </a>
                                            @endif
                                            <a href="{{route('edit-category',['id'=>$categories->id])}}" class="btn btn-warning">
                                                <i class="fa fa-edit"aria-hidden="true"></i>
                                            </a>
                                                @if(Auth::user()->role==1)
                                                    <a href="{{route('delete-category',['id'=>$categories->id])}}" onclick="return confirm('are you sure?')" class="btn btn-danger">
                                                        <i class="fa fa-trash"aria-hidden="true"></i>
                                                    </a>

                                                @endif
                                        </td>
                                    </tr>
                                    @endif
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>

@endsection
