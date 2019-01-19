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
                <form role="form" method="POST">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="exampleInputValue">Value</label>
                            <input type="number" class="form-control" id="exampleInputValue" name="value" placeholder="Enter value" required>
                        </div>
                        <div class="form-group">
                            <label>Currency</label>
                            <select class="form-control select2 select2-hidden-accessible" style="width: 100%;" name="currency">
                                <option selected="selected" hidden>Select currency</option>
                                <option value="usd">USD</option>
                                <option value="eur">EUR</option>
                                <option value="uah">UAH</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Type</label>
                            <select class="form-control select2 select2-hidden-accessible" style="width: 100%;" name="type">
                                <option selected="selected" hidden>Select type</option>
                                <option value="cash">Cash</option>
                                <option value="card">Card</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Description</label>
                            <textarea class="form-control" name="description" rows="3" placeholder="Enter ..."></textarea>
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