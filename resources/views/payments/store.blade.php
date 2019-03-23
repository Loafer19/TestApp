@extends('layouts.master') 

@section('pageName', 'You Payment') 

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('home')}}">Home</a></li>
@endsection
 
@section('mainContent')
    <div class="row">
        <div class="col-6">

            <div class="card card-success">

                <div class="card-header">
                    <h3 class="card-title">
                        <h3 class="card-title">Bill</h3>
                    </h3>
                </div>

                <div class="card-body">
                    <dl>
                        <dt>Payment value:</dt>
                        <dd>{{ $payment->value }}</dd>
                        
                        <dt>Payment currency:</dt>
                        <dd>{{ $payment->currency }}</dd>
                        
                        <dt>Description:</dt>
                        <dd>{{ $payment->description }}</dd>
                    </dl>
                </div>

                <div class="card-footer">
                    <form method="POST" action="https://www.liqpay.ua/api/3/checkout" accept-charset="utf-8"> 
                        <input type="hidden" name="data" value="{{ $data }}"/>
                        <input type="hidden" name="signature" value="{{ $signature }}"/> 
                        <input type="image" src="//static.liqpay.ua/buttons/p1ru.radius.png"/> 
                    </form>
                </div>
            </div>

        </div>
    </div>
@endsection
 
@section('scripts')
@endsection