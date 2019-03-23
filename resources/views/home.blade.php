@extends('layouts.master') 

@section('pageName', 'Dashboard')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('home')}}">Home</a></li>
@endsection
 
@section('mainContent')
    <div class="row">
        <div class="col-12">
            <div class="card card-primary">
                
                <div class="card-header">
                    <h3 class="card-title">Payments</h3>
                </div>
                
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover">
                        <tbody>
                            <tr>
                                <th>No.</th>
                                <th>Value</th>
                                <th>Status</th>
                                <th>Currency</th>
                                <th>Description</th>
                            </tr>
                            @foreach ($payments as $key => $item)
                                <tr>
                                    <td>{{ $key + 1 }}.</td>
                                    <td>{{ $item->value }}</td>
                                    <td>{{ $item->status }}</td>
                                    <td>{{ $item->currency }}</td>
                                    <td>{{ $item->description }}</td>
                                </tr> 
                            @endforeach
                            
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
@endsection
 
@section('scripts')
@endsection