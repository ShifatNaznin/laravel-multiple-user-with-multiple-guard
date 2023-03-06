<!doctype html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Responsive Bootstrap 4 Admin &amp; Dashboard Template">

    <title>Application</title>

    <link rel="shortcut icon" href="{{ asset('admin') }}/assets/dist/img/favicon.png">

    <link href="{{ asset('admin') }}/assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <link href="{{ asset('admin') }}/assets/dist/css/style.css" rel="stylesheet">
</head>

<body class="bg-white">
    <div class="d-flex align-items-center h-100vh">
        <div class="form-wrapper m-auto">
            <div class="form-container form-container-2 my-4">
                <div class="panel bg-light">

                    <div class="panel-header justify-content-center text-center mb-3">
                        <h3 class="fs-24">Reset Password</h3>
                    </div>
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                    <form class="register-form" method="POST" action="{{ route('password.update') }}">
                        @csrf
                        <input type="hidden" name="token" value="{{ $token }}">

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Reset Password') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('admin') }}/assets/plugins/jQuery/jquery-3.4.1.min.js"></script>
    <script src="{{ asset('admin') }}/assets/dist/js/popper.min.js"></script>
    <script src="{{ asset('admin') }}/assets/plugins/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>