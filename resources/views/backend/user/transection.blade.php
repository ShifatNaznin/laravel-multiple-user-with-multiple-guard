@extends('backend.admin')
@section('content')
    @include('flash::message')
    <div class="content-header row align-items-center m-0">
        <div class="col-sm-8 header-title p-0">
            <div class="media">

                <div class="media-body">
                    <h1 class="font-weight-bold">List of User Transection</h1>
                </div>
            </div>
        </div>
        <div class="col-sm-4 text-right p-0">
            {{-- <a href="{{ route('createAsset') }}" class="btn btn-success mb-2 mr-1">
            <i class="typcn typcn-plus mr-2"></i>Add Asset</a> --}}
        </div>
    </div>

    <div class="body-content">

        <div class="card mb-4">
            <div class="card-header">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="fs-17 font-weight-600 mb-0">Name: {{$user->name}}</h6>
                        <h6 class="fs-17 font-weight-600 mb-0">Email: {{$user->email}}</h6>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table display table-bordered table-striped table-hover multi-tables dataTable">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Date</th>
                                <th>Amount</th>
                                <th>Commission Amount</th>
                                <th>Commission Rate</th>
                                <th>Amount After Commission</th>
                                <th>Details</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $index = 1;
                            @endphp
                            @foreach ($data as $item)
                                <tr>
                                    <td>{{ $index }}</td>
                                    <td>{{date('d-m-Y', strtotime($item->created_at)); }}</td>
                                    <td>{{ $item->amount }}</td>
                                    <td>{{ $item->commissionAmount }}</td>
                                    <td>{{ $item->commissionRate }}</td>
                                    <td>{{ $item->amountAfterCommission }}</td>
                                    <td>{{ $item->details }}</td>
                                    
                                </tr>
                                @php
                                    $index++;
                                @endphp
                                
                            @endforeach

                        </tbody>


                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
