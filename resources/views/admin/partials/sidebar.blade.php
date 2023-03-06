<nav class="sidebar sidebar-bunker" id="non-printable">
    <div class="sidebar-header text-center">

        <p
            style="color: #fff;
            font-size: 20px;
            letter-spacing: .6px;
            text-transform: uppercase;
            padding-top: 1px;">
            Application </p>
    </div>
    <!--/.sidebar header-->
    <div class="profile-element profile-element-2 d-flex align-items-center flex-shrink-0">
        <div class="avatar online">
            <img src="{{ asset('admin') }}/assets/dist/img/avatar-1.jpg" class="img-fluid rounded-circle" alt="">

        </div>
        <div class="profile-text">
            <h6 class="m-0">{{ Auth::user()->name }}</h6>
            <span><a href="{{ route('home') }}" style="color: #fff;">{{ Auth::user()->email }}</a></span>
        </div>
    </div>
    @php
        $user = Auth::user();
        
        $routeAccessId = explode(',', $user->userFeature ?? '');
    @endphp

    <div class="sidebar-body">
        <nav class="sidebar-nav">
            <ul class="metismenu">
                <li class="nav-label nav-label-2">Main Menu</li>
                <li class="{{ Route::is('home') ? 'mm-active' : '' }}"><a href="{{ route('home') }}">
                        <i class="typcn typcn-home-outline mr-2"></i>Dashboard</a></li>
                        <li class="{{ Route::is('userList') ? 'mm-active' : '' }}">
                            <a href="{{ route('userList') }}"><i class="typcn typcn-home-outline mr-2"></i>User List</a>
                        </li>
                <li class="{{ Route::is('userRoleList') ? 'mm-active' : '' }}"><a href="{{ route('userRoleList') }}">
                        <i class="typcn typcn-home-outline mr-2"></i>User Role List</a></li>
                <li class="{{ Route::is('userFeatureList') ? 'mm-active' : '' }}"><a href="{{ route('userFeatureList') }}">
                        <i class="typcn typcn-home-outline mr-2"></i>User Features</a></li>
            </ul>
        </nav>
    </div>
</nav>
