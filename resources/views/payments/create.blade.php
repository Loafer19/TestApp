@extends('layouts.master')

@section('pageName', 'Create payment')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('home')}}">Home</a></li>
@endsection

@section('mainContent')
<div class="row">
        <div class="col-6">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Bill</h3>
                </div>
                <form role="form" action="{{ route('payment.store')}}" method="POST">
                    
                    <div class="card-body">
                        <div class="form-group">
                            <label for="exampleInputValue">Value</label>
                            <input type="number" class="form-control" id="exampleInputValue" name="value" placeholder="Enter value" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputValue2">Currency</label>
                            <select class="form-control select2 select2-hidden-accessible" id="exampleInputValue2" style="width: 100%;" name="currency" required>
                                <option disabled selected hidden value=''>Select currency</option>
                                <option value="USD">USD</option>
                                <option value="EUR">EUR</option>
                                <option value="UAH">UAH</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputValue3">Type</label>
                            <select class="form-control select2 select2-hidden-accessible" id="exampleInputValue3" style="width: 100%;" name="type" disabled>
                                <option hidden>Select type</option>
                                <option selected="selected" value="type">Liqpay</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputValue4">Description</label>
                            <textarea class="form-control" name="description" rows="3" placeholder="Enter ..." id="exampleInputValue4"></textarea>
                        </div>
                    </div>

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