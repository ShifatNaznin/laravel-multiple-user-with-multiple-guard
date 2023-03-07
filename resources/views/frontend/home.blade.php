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
        <div class="d-flex align-items-centerh-100vh">
            @yield('content')
           
        </div>
  
        <script src="{{ asset('admin') }}/assets/plugins/jQuery/jquery-3.4.1.min.js"></script>
        <script src="{{ asset('admin') }}/assets/dist/js/popper.min.js"></script>
        <script src="{{ asset('admin') }}/assets/plugins/bootstrap/js/bootstrap.min.js"></script>
        @stack('js')
    </body>
</html>