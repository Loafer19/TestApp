@extends('layouts.master')

@section('companyName', $company->name)

@section('pageName', 'Dashboard')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="/home">Home</a></li>
    <li class="breadcrumb-item">Show user</li>
@endsection

@section('mainContent')

    <div class="row">
        <div class="col-12">

            @if (Auth::user()->id == $company->master_id)
                <div class="card">

                    <div class="card-header">
                        <h3 class="card-title">{{ $user->name }} bills in company - {{ $company->name }}</h3>
                    </div>
        
                    <div class="card-body">
                        <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
                            <div class="row">
                                <div class="col-sm-12">
                                    <table id="example1" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
                                        <thead>
                                            <tr role="row">
                                                <th>Biil -> id</th>
                                                <th>Type</th>
                                                <th>Value</th>
                                                <th>Currency</th>
                                                <th>Description</th>
                                                <th>Created date</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($bills as $item)
                                                <tr role="row" class="odd">
                                                    <td>{{ $item->id }}</td>
                                                    <td>{{ $item->type }}</td>
                                                    <td>{{ $item->value }}</td>
                                                    <td>{{ $item->currency }}</td>
                                                    <td>{{ $item->description }}</td>
                                                    <td>{{ $item->created_at }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            @else
                <h1>No roots</h1>
            @endif

        </div>
    </div>
    
@endsection

@section('scripts')
    
@endsection