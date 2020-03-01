@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @include('layouts.sidebar')
            <div class="col-md-7">
                <div class="card">
                    <div class="card-header">Add Product</div>
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        {{Form::open(['route'=>'new-product','method'=>'post','class'=>'form-horizontal','enctype'=>'multipart/form-data'])}}
                        <div class="form-group">
                            <label>Porduct Name</label>
                            <input type="text" name="proudct_name" class="form-control">
                            <input type="hidden" name="userproduct_id" class="form-control" value="{{Auth::User()->id}}">
                            <span class="text-danger">{{$errors->has('proudct_name')?$errors->first('proudct_name'):''}}</span>
                        </div>
                        <select name="category_id" class="form-control">
                            <option value="">---select---</option>
                            @foreach($categories as $categorie)
                                <option value="{{$categorie->id}}">{{$categorie->category_name}}</option>
                            @endforeach
                        </select>
                        <div class="form-group">
                            <label>Porduct Price</label>
                            <input type="text" name="product_price" class="form-control">
                            <span class="text-danger">{{$errors->has('product_price')?$errors->first('product_price'):''}}</span>
                        </div>
                        <div class="form-group">
                            <label>Porduct Quantity</label>
                            <input type="text" name="product_quantity" class="form-control">
                            <span class="text-danger">{{$errors->has('product_quantity')?$errors->first('product_quantity'):''}}</span>
                        </div>
                        <div class="form-group">
                            <label>Porduct Description</label>
                            <textarea  name="product_description" class="form-control"></textarea>
                            <span class="text-danger">{{$errors->has('product_description')?$errors->first('product_description'):''}}</span>
                        </div>
                        <div class="form-group">
                            <label>Porduct Image</label>
                            <input type="file" name="product_image">
                            <span class="text-danger">{{$errors->has('product_image')?$errors->first('product_image'):''}}</span>
                        </div>
                        <div class="form-group">
                            <label>Porduct Publication</label>
                            <input type="radio" name="publication_status" value="1">published
                            <input type="radio" name="publication_status" value="0">unpublished
                        </div>
                        <div>
                            <input type="submit" name="btn" class="btn btn-primary" value="Add Product">
                        </div>


                        {{Form::close()}}
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
