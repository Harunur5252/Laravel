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
                                <th scope="col">Product Name</th>
                                <th scope="col">Category Name</th>
                                <th scope="col">Product Price</th>
                                <th scope="col">Product Quantity</th>
                                <th scope="col">Product Description</th>
                                <th scope="col">Product Image</th>
                                <th scope="col">Publication Status</th>
                                <th scope="col">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php($i=1)
                            @foreach($product as $products)
                                @if(Auth::user()->role==1)
                                <tr>
                                    <th scope="row">{{$i++}}</th>
                                    <td>{{$products->proudct_name}}</td>
                                    <td>{{$products->category_name}}</td>
                                    <td>{{$products->product_price}}</td>
                                    <td>{{$products->product_quantity}}</td>
                                    <td>{{$products->product_description}}</td>
                                    <td><img src="{{asset($products->product_image)}}" height="100px" width="100px"></td>
                                    <td>{{$products->publication_status==1?'published':'unpublished'}}</td>
                                    <td>
                                        @if($products->publication_status==1)

                                            <a href="{{route('published-product',['id'=>$products->id])}}" class="btn btn-primary">
                                                <i class="fa fa-arrow-up"></i>
                                            </a>
                                        @else
                                            <a href="{{route('unpublished-product',['id'=>$products->id])}}" class="btn btn-success">
                                                <i class="fa fa-arrow-down"></i>
                                            </a>
                                        @endif
                                            <a href="{{route('edit-product',['id'=>$products->id])}}" class="btn btn-secondary">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                            <a href="{{route('delete-product',['id'=>$products->id])}}" class="btn btn-danger">
                                                <i class="fa fa-trash"></i>
                                            </a>
                                    </td>

                                </tr>
                                    @elseif($products->userproduct_id == Auth::user()->id)
                                    <tr>
                                        <th scope="row">{{$i++}}</th>
                                        <td>{{$products->proudct_name}}</td>
                                        <td>{{$products->category_name}}</td>
                                        <td>{{$products->product_price}}</td>
                                        <td>{{$products->product_quantity}}</td>
                                        <td>{{$products->product_description}}</td>
                                        <td><img src="{{asset($products->product_image)}}" height="100px" width="100px"></td>
                                        <td>{{$products->publication_status==1?'published':'unpublished'}}</td>
                                        <td>
                                            @if($products->publication_status==1)

                                                <a href="{{route('published-product',['id'=>$products->id])}}" class="btn btn-primary">
                                                    <i class="fa fa-arrow-up"></i>
                                                </a>
                                            @else
                                                <a href="{{route('unpublished-product',['id'=>$products->id])}}" class="btn btn-success">
                                                    <i class="fa fa-arrow-down"></i>
                                                </a>
                                            @endif
                                            <a href="{{route('edit-product',['id'=>$products->id])}}" class="btn btn-secondary">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                            <a href="{{route('delete-product',['id'=>$products->id])}}" class="btn btn-danger">
                                                <i class="fa fa-trash"></i>
                                            </a>
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
