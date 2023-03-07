@extends('frontend.home')
@section('content')
    <div class="form-wrapper m-auto">
        <div class="form-container form-container-2 my-4">
            <div class="panel bg-light">

                <div class="panel-header text-center mb-3">
                    <h3 class="fs-24">Affiliate or Sub Affiliate User Login</h3>
                </div>
                <form class="register-form" method="POST" action="{{ route('affiliate.affiliatelogin') }}">
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
                </form>
            </div>
        </div>
    </div>
@endsection
