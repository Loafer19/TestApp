@extends('layouts.master')

@section('companyName', $company->name)

@section('pageName', 'Dashboard')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="/home">Home</a></li>
@endsection

@section('mainContent')

    <div class="row">
        <div class="col-12">

            @if (Auth::user()->id == $company->master_id)
                <div class="card">

                    <div class="card-header">
                        <h3 class="card-title">Users bill</h3>
                    </div>
        
                    <div class="card-body">
                        <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
                            <div class="row">
                                <div class="col-sm-12">
                                    <table id="example1" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
                                        <thead>
                                            <tr role="row">
                                                <th>User -> id</th>
                                                <th>User -> name</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($users as $item)
                                                <tr role="row" class="odd">
                                                    <td>{{ $item->id }}</td>
                                                    <td>{{ $item->name }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            @endif
            
        </div>
    </div>
    
@endsection

@section('scripts')
    
@endsection