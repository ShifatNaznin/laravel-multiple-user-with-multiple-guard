@extends('backend.admin')
@section('content')
<div class="row justify-content-center">
    <div class="col-sm-8 col-md-8 col-xl-10">
        @include('flash::message')

        <div class="body-content">
            <div class="card mb-4">
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="fs-17 font-weight-600 mb-0">User Information</h6>
                        </div>
                        <div class="col-sm-4 text-right p-0">
                            <a href="{{ url()->previous() }}" class="btn btn-success mb-2 mr-1">
                                <i class="typcn typcn-arrow-back-outline mr-2"></i>Back</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-xs-10 col-sm-10 col-md-10">
                            <table class="table table-2 table-striped table-nowrap">
                                <tbody>
                                    <tr>
                                        <td>
                                            <div><strong>User Name</strong></div>
                                        </td>
                                        <td>:</td>
                                        <td>{{$data->name}}</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div><strong>Email</strong></div>
                                        </td>
                                        <td>:</td>
                                        <td>{{$data->email}}</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div><strong>Registration Code</strong></div>
                                        </td>
                                        <td>:</td>
                                        <td>{{$data->registrationCode}}</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div><strong>DOF</strong></div>
                                        </td>
                                        <td>:</td>
                                        <td>{{$data->dob}}</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div><strong>Current Amount</strong></div>
                                        </td>
                                        <td>:</td>
                                        <td>{{$data->currentAmount}}</td>
                                    </tr>
                                   
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection