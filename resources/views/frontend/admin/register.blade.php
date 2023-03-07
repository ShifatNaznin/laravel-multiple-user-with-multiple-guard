@extends('frontend.home')
@section('content')
    <div class="form-wrapper m-auto">
        <div class="form-container form-container-2 my-4">
            <div class="panel bg-light">
                <div class="panel-header text-center mb-3">
                    <h3 class="fs-24">Admin Registration</h3>
                </div>
                <form class="register-form" method="POST" action="{{ route('admin.signup') }}">
                    @csrf
                    <div class="form-group">
                        <label class="font-weight-600">Name</label>
                        <input type="text" id="name" class="form-control @error('name') is-invalid @enderror"
                            name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
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
                        <input type="text" class="form-control" name="userType" value="admin" readonly>
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
                    <button type="submit" class="btn btn-success btn-block">Sign up</button>

                    <p class="text-muted text-center mt-3 mb-0">Already have an account? <a class="external"
                            href="{{ route('admin.login') }}">Sign In</a>
                    </p>
                </form>
            </div>
        </div>
    </div>
@endsection
