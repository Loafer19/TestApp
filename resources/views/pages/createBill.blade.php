@extends('layouts.master')

@section('companyName', $company->name)

@section('pageName', 'Create bill') 

@section('breadcrumb')

    <li class="breadcrumb-item"><a href="/home">Home</a></li>
    <li class="breadcrumb-item">Create bill</li>

@endsection
 
@section('mainContent')

    <div class="row">
        <div class="col-6">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Bill in company - {{ $company->name }}</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form role="form" method="POST" action="{{ route('register') }}">
                    @csrf
                    <input id="" type="hidden" class="form-control" name="type" value="0">

                    <div class="card-body">
                        <div class="form-group">
                            <label for="exampleInputName">Name</label>
                            <input type="text" class="form-control" id="exampleInputName" name="name" placeholder="Enter name" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Email address</label>
                            <input type="email" class="form-control" id="exampleInputEmail1" name="email" placeholder="Enter email" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Password</label>
                            <input type="password" class="form-control" id="exampleInputPassword1" name="password" placeholder="Password" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword2">Confirm Password</label>
                            <input type="password" class="form-control" id="exampleInputPassword2" name="password_confirmation" placeholder="Confirm password" required>
                        </div>
                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
 
@section('scripts')

@endsection