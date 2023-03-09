@extends('backend.admin')
@section('content')
    @include('flash::message')
    <div class="content-header row align-items-center m-0">
        <div class="col-sm-8 header-title p-0">
            <div class="media">

                <div class="media-body">
                    <h1 class="font-weight-bold">Sub Affiliate User</h1>
                </div>
            </div>
        </div>
        <div class="col-sm-4 text-right p-0">
        </div>
    </div>

    <div class="body-content">

        <div class="card mb-4">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table display table-bordered table-striped table-hover multi-tables dataTable">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Registration Code</th>
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
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->email }}</td>
                                    <td>{{ $item->promoCode}}</td>
                                    
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
