@extends('frontend.home')
@section('content')
<div class="form-wrapper m-auto">
    <div class="col-sm-12 text-right p-0">
        <a href="{{('/')}}" class="btn btn-success mb-2 mr-1">
            <i class="typcn typcn-arrow-back-outline mr-2"></i>Back</a>
    </div>
    <div class="form-container form-container-2 my-4">
        @include('flash::message')
        <div class="panel bg-light">
            <div class="panel-header text-center mb-3">
                <h3 class="fs-24">User Registration</h3>
            </div>
            <form class="register-form" method="POST" action="{{ route('user.signup') }}">
                @csrf

                <div class="form-group">
                    <label class="font-weight-600">Name</label>
                    <input type="text" id="name" class="form-control @error('name') is-invalid @enderror" name="name"
                        value="{{ old('name') }}" required autocomplete="name" autofocus>
                    @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label class="font-weight-600">Email</label>
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                        name="email" value="{{ old('email') }}" required autocomplete="email">

                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label class="font-weight-600">User Type</label>
                    <input type="text" class="form-control" name="userType" value="user" readonly>
                </div>
                <div class="form-group">
                    <label class="font-weight-600">Dob</label>
                    <input type="date" class="form-control" name="dob" value="{{ old('dob') }}" required>

                    @error('dob')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label class="font-weight-600">Password</label>
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                        name="password" required autocomplete="new-password">

                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label class="font-weight-600">Confirm Password</label>
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation"
                        required autocomplete="new-password">
                </div>
                <div class="form-group col-8">
                    <button type="button" class="btn btn-info btn-block affiliate">Use Affiliate or Sub Affiliate
                        Code</button>
                </div>
                <div class="form-group affiliate-div">
                    <label class="font-weight-600">Affiliate or Sub Affiliate Code</label>
                    <input type="text" id="affcode" class="form-control" name="registrationCode"
                        value="{{ old('registrationCode') }}">
                    @error('registrationCode')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <button type="submit" class="btn btn-success btn-block">Sign up</button>

                <p class="text-muted text-center mt-3 mb-0">Already have an account? <a class="external"
                        href="{{ route('user.login') }}">Sign In</a>
                </p>
            </form>
        </div>
    </div>
</div>
@push('js')
<script>
    $(".affiliate-div").hide();
            $(document).ready(function() {
                $(".affiliate").click(function() {
                    $('#affcode').val('');
                    $(".affiliate-div").toggle();
                });
            });
</script>
@endpush
@endsection