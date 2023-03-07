@extends('backend.admin')
@section('content')
@include('flash::message')
    <div class="row justify-content-center">
        <div class="col-sm-8 col-md-8 col-xl-10">

            <div class="body-content">
                <div class="card mb-4">
                    <div class="card-header">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h6 class="fs-17 font-weight-600 mb-0">Add Affiliate User</h6>
                            </div>
                        </div>
                    </div>
                    <form class="register-form" method="POST" action="{{ route('affiliate.signup') }}">
                        @csrf
                        <div class="card-body">
                                <div class="form-group">
                                    <label class="font-weight-600">Name</label>
                                    <input type="text" id="name"
                                        class="form-control @error('name') is-invalid @enderror" name="name"
                                        value="{{ old('name') }}" required autocomplete="name" autofocus>
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label class="font-weight-600">Email</label>
                                    <input id="email" type="email"
                                        class="form-control @error('email') is-invalid @enderror" name="email"
                                        value="{{ old('email') }}" required autocomplete="email">

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="font-weight-600">User Type</label>
                                    <input type="text" class="form-control" name="userType" value="affiliate" readonly>
                                </div>
                                <div class="form-group">
                                    <label class="font-weight-600">Password</label>
                                    <input id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        required autocomplete="new-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="font-weight-600">Confirm Password</label>
                                    <input id="password-confirm" type="password" class="form-control"
                                        name="password_confirmation" required autocomplete="new-password">
                                </div>
                                <button type="submit" class="btn btn-success btn-block">Add</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
