@extends('layouts.app')

@section('content')

<div class="container ml-5">
    <div class="row justify-content-center">
       @include('layouts.sidebar')
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                        <form class="form-horizontal" action="{{route('new-category')}}" method="post">
                            @csrf
                            <div class="form-group ">
                                <label>Category Name</label>
                                <input type="text" name="category_name" class="form-control" placeholder="Enter name">
                                <input type="hidden" name="user_id" class="form-control" value="{{Auth::user()->id}}">
                            </div>
                            <div class="form-group">
                                <label>Category Descriptions</label>
                                <input type="text" name="category_description" class="form-control" placeholder="Enter description">
                            </div>
                            <div>
                                <label>Publication Status</label>
                                <input type="radio" name="publication_status" value="1">Published
                                <input type="radio" name="publication_status" value="0">Unpublished
                            </div>
                            <div>
                                <button type="submit" name="btn" class="btn btn-primary">Add Category</button>
                            </div>
                        </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
