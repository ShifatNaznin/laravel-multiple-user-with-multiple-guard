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
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    <div class="d-flex align-items-center justify-content-center text-center h-100vh">
        <div class="form-wrapper m-auto">
            <div class="form-container form-container-2 my-4">
                <div class="panel bg-light">
                    <div class="panel-header text-center mb-3">
                        <div class="panel-header text-center mb-3">
                            <h3 class="fs-24">Sign up for your account!</h3>
                        </div>
                        <form class="register-form" method="POST" action="{{ route('register') }}">
                            @csrf
                            <input type="hidden" name="registrationCode" value="{{ request()->get('ref') }}">
                            <div class="form-group">
                                <input type="text" id="name" placeholder="Name"
                                    class="form-control @error('name') is-invalid @enderror" name="name"
                                    value="{{ old('name') }}" required autocomplete="name" autofocus>
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <input id="email" type="email" placeholder="Enter email"
                                    class="form-control @error('email') is-invalid @enderror" name="email"
                                    value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <select class="form-control @error('userRole') is-invalid @enderror" name="userRole"
                                    value="{{ old('userRole') }}" required>
                                    <option value="">Select</option>
                                    <option value="admin">Admin</option>
                                    <option value="affiliate">Affiliate</option>
                                    <option value="subaffiliate">Sub Affiliate</option>
                                    <option value="user">User</option>
                                </select>
                                @error('userRole')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input id="password" type="password" placeholder="Password"
                                    class="form-control @error('password') is-invalid @enderror" name="password"
                                    required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input id="password-confirm" type="password" placeholder="Password confirm"
                                    class="form-control" name="password_confirmation" required
                                    autocomplete="new-password">
                            </div>
                            <button type="submit" class="btn btn-success btn-block">Sign up</button>

                            <p class="text-muted text-center mt-3 mb-0">Already have an account? <a class="external"
                                    href="{{ route('login') }}">Sign In</a>
                            </p>
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
