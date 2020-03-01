@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @include('layouts.sidebar')
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Edit category</div>
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <form class="form-horizontal" action="{{route('update-category')}}" method="post">
                            @csrf
                            <div class="form-group ">
                                <label>Category Name</label>
                                <input type="text" name="category_name" value="{{$category->category_name}}" class="form-control" placeholder="Enter name">
                                <input type="hidden" name="id" value="{{$category->id}}" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Category Descriptions</label>
                                <input type="text" name="category_description" value="{{$category->category_description}}"class="form-control" placeholder="Enter description">
                            </div>
                            <div>
                                <label>Publication Status</label>
                                <input type="radio" name="publication_status" {{$category->publication_status==1?'checked':'unchecked'}} value="1">Published
                                <input type="radio" name="publication_status" {{$category->publication_status==0?'checked':'unchecked'}} value="0">Unpublished
                            </div>
                            <div>
                                <button type="submit" name="btn" class="btn btn-primary">Update Category</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>

        </div>
    </div>

@endsection
