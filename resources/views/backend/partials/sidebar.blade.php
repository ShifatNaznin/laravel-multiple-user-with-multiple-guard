@php
    if (Auth::guard('admin')->check()) {
        $userdata = Auth::guard('admin')->user();
    } elseif (Auth::guard('affiliate')->check()) {
        $userdata = Auth::guard('affiliate')->user();
    } elseif (Auth::guard('web')->check()) {
        $userdata = Auth::guard('web')->user();
    }
@endphp

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
            <h6 class="m-0">{{ $userdata->name }}</h6>
            <span><a href="{{ route('home') }}" style="color: #fff;">{{ $userdata->email }}</a></span>
        </div>
    </div>
    <div class="sidebar-body">
        <nav class="sidebar-nav">
            <ul class="metismenu">
                <li class="nav-label nav-label-2">Main Menu</li>
                <li class="{{ Route::is('home') ? 'mm-active' : '' }}"><a href="{{ route('home') }}">
                        <i class="typcn typcn-home-outline mr-2"></i>Dashboard</a></li>
                <li class="nav-label nav-label-2">Affiliate</li>
                @if (Auth::guard('admin')->check())
                    <li class="{{ Route::is('affiliate.register') ? 'mm-active' : '' }}">
                        <a href="{{ route('affiliate.register') }}"><i class="typcn typcn-home-outline mr-2"></i>Add
                            Affiliate User</a>
                    </li>
                @endif
                @if (Auth::guard('affiliate')->check())
                    @php
                        $userdata = Auth::guard('affiliate')->user();
                        
                    @endphp
                    @if ($userdata->userType == 'affiliate')
                        <li class="{{ Route::is('affiliate.subAffiliateRegister') ? 'mm-active' : '' }}">
                            <a href="{{ route('affiliate.subAffiliateRegister') }}"><i
                                    class="typcn typcn-home-outline mr-2"></i>Add Sub Affiliate User</a>
                        </li>
                    @endif
                    <li class="{{ Route::is('affiliate.transection') ? 'mm-active' : '' }}">
                        <a href="{{ route('affiliate.transection') }}"><i class="typcn typcn-user-outline mr-2"></i>Affiliate Transection</a>
                    </li>
                @endif
                @if (Auth::guard('web')->check())
                <li class="{{ Route::is('user.information') ? 'mm-active' : '' }}">
                    <a href="{{ route('user.information',$userdata->id) }}"><i class="typcn typcn-user-outline mr-2"></i>User Information</a>
                </li>
                <li class="{{ Route::is('user.addMoney') ? 'mm-active' : '' }}">
                    <a href="{{ route('user.addMoney',$userdata->id) }}"><i class="typcn typcn-user-outline mr-2"></i>Add Money</a>
                </li>
                <li class="{{ Route::is('user.transection') ? 'mm-active' : '' }}">
                    <a href="{{ route('user.transection') }}"><i class="typcn typcn-user-outline mr-2"></i>User Transection</a>
                </li>
            @endif
            </ul>
        </nav>
    </div>
</nav>
