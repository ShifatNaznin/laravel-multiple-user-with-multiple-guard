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
                <h3 class="fs-24">Admin Login</h3>
            </div>
            <form class="register-form" method="POST" action="{{ route('admin.adminlogin') }}">
                @csrf
                <div class="form-group">
                    <input id="email" type="email" placeholder="Enter email"
                        class="form-control @error('email') is-invalid @enderror" name="email"
                        value="{{ old('email') }}" required autocomplete="email" autofocus>

                    @if (Session::has('error'))
                    <span class="invalid-feedback" role="alert">
                        <strong> {{ Session::get('error') }}</strong>
                    </span>
                    @endif
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group">
                    <input id="password" type="password" placeholder="Password"
                        class="form-control @error('password') is-invalid @enderror" name="password" required
                        autocomplete="current-password">

                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <button type="submit" class="btn btn-success btn-block">Login</button>
                <div class="bottom-text text-center my-3">
                    <a href="{{ route('admin.register') }}" class="external">Don't have an account?</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection