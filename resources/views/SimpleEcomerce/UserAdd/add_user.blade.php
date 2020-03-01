@extends('layouts.app')

@section('content')

    <div class="container ml-5">
        <div class="row justify-content-center">
            @include('layouts.sidebar')
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Add User</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <form class="form-horizontal" action="{{route('new-user')}}" method="post">
                            @csrf
                            <div class="form-group ">
                                <label>User Namee</label>
                                <input type="text" name="name" class="form-control" placeholder="Enter name">
                            </div>
                            <div class="form-group">
                                <label>User Email</label>
                                <input type="email" name="email" class="form-control" placeholder="Enter email">
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" name="password" class="form-control" placeholder="Enter password">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Confirm Password</label>
                                <input type="password" class="form-control" name="password_confirmation" id="password-confirm" placeholder="Confirm_Password">
                            </div>
                            <div class="form-group">
                                <label>Role</label>
                                <select name="role" class="form-control">
                                    <option value="">---select---</option>
                                    <option value="1">Super Admin</option>
                                    <option value="2">Admin</option>
                                    <option value="3">Vendor</option>
                                </select>
                            </div>
                            <div>
                                <button type="submit" name="btn" class="btn btn-primary">Add User</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
