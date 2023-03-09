@extends('backend.admin')
@section('content')
    @include('flash::message')
    <div class="content-header row align-items-center m-0">
        <div class="col-sm-8 header-title p-0">
            <div class="media">

                <div class="media-body">
                    <h1 class="font-weight-bold">Sub Affiliate Commission</h1>
                </div>
            </div>
        </div>
        <div class="col-sm-4 text-right p-0">
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
                                <th>User</th>
                                <th>User Email</th>
                                <th>User Amount</th>
                                <th>Commission Percent</th>
                                <th>Commission Amount</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $index = 1;
                                $total=0;
                            @endphp
                            @foreach ($data as $item)
                                <tr>
                                    <td>{{ $index }}</td>
                                    <td>{{date('d-m-Y', strtotime($item->created_at)); }}</td>
                                    <td>{{ $item->get_user->name }}</td>
                                    <td>{{ $item->get_user->email }}</td>
                                    <td>{{ $item->userAmmount }}</td>
                                    <td>{{ $item->commissionPercent }}</td>
                                    <td>{{ $item->commissionAmount }}</td>
                                    @php
                                         $total+=$item->commissionAmount;
                                    @endphp
                                    
                                </tr>
                                @php
                                    $index++;
                                @endphp
                                
                            @endforeach

                        </tbody>
                        <tfoot>
                            <tr>
                                <th colspan="6" class="text-center">Total Amount</th>
                                <th>{{$total}}</th>
                            </tr>
                        </tfoot>


                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
