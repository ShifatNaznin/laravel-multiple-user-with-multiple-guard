@extends('admin.admin')
@section('content')
<div class="row justify-content-center">
    <div class="col-sm-8 col-md-8 col-xl-10">
        @include('flash::message')

        <div class="body-content">
            <div class="card mb-4">
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="fs-17 font-weight-600 mb-0">Update User Information</h6>
                        </div>
                    </div>
                </div>
                <form action="{{ route('updateUser') }}" method="post" id="personal-info-form">
                    @csrf
                    <input type="hidden" name="id" value="{{$data->id}}">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-6 p-l-30 p-r-30 left-side">

                                <div class="form-group">
                                    <label class="font-weight-600">Name</label>
                                    <input type="text" class="form-control" name="name" placeholder="Enter Your Name"
                                        value="{{$data->name}}">
                                </div>
                                <div class="form-group">
                                    <label class="font-weight-600">Email</label>
                                    <input type="email" class="form-control" name="email" placeholder="Enter Your Email"
                                        value="{{$data->email}}">
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-6 p-l-30 p-r-30">

                                <div class="form-group">
                                    <label class="font-weight-600">Old Password</label>
                                    <input type="password" class="form-control" name="oldPassword"
                                        placeholder="Old Password">
                                </div>
                                <div class="form-group">
                                    <label class="font-weight-600">New Password</label>
                                    <input type="password" class="form-control" id="newPassword" name="newPassword"
                                        placeholder="New Password">
                                </div>
                                <div class="form-group">
                                    <label class="font-weight-600">Confirmed Password</label>
                                    <input type="password" class="form-control" name="confirmedPassword"
                                        placeholder="Password confirmed" value="">

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer text-right">
                        <button type="submit" class="btn btn-success mr-1">Submit</button>
                        <a href="{{route('home')}}" class="btn btn-danger">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@push('js')
<script>
$(document).ready(function () {
    $.validator.addMethod(
        "lettersonly",
        function (value, element) {
            return this.optional(element) || /^[a-zA-z\s]+$/i.test(value);
        },
        "Please enter only alphabet"
    );
    $("#personal-info-form").validate({
        rules: {
            confirmedPassword: {
                equalTo: "#newPassword",
            },
        },
        messages: {
            confirmedPassword: {
                equalTo: "Confirm Password does not match with New Password",
            },
        },
    });
});

</script>
@endpush
@endsection