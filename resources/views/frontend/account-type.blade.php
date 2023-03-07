@extends('frontend.home')
@section('content')
<div class="form-wrapper m-auto">
    <div class="form-container form-container-2 my-4">
        <div class="panel bg-light" style="background-color: #f1f1f1 !important;">
            
            <div class="panel-header text-center mb-3">
                <h3 class="fs-24">Choose Account Type</h3>
            </div>
            <div class="card-body">
                <div class="row justify-content-center">
                    <div class="col-5 col-sm-3 col-lg-5">
                        <div class="nav flex-column nav-pills">
                            <a class="nav-link nav-link-home" href="{{route('admin.login')}}">Admin</a>
                            <a class="nav-link nav-link-home" href="{{route('affiliate.login')}}">Affiliate</a>
                            <a class="nav-link nav-link-home" href="{{route('user.login')}}">User</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
