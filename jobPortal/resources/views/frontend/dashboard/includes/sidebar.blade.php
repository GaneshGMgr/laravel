@employer
<div class="pxp-dashboard-side-panel d-none d-lg-block">
    <div class="pxp-logo">
        <a href="{{route('home')}}" class="pxp-animate"><span style="color: var(--pxpMainColor)">j</span>obster</a>
    </div>

    <nav class="mt-3 mt-lg-4 d-flex justify-content-between flex-column pb-100">
        <div class="pxp-dashboard-side-label">Admin tools</div>
        <ul class="list-unstyled">
            <li><a href="{{ route('dashboard') }}"><span class="fa fa-home"></span>Dashboard</a></li>
            <li class="pxp"><a href="{{ route('edit.profile') }}"><span class="fa fa-pencil"></span>Edit
                    Profile</a></li>

            <li><a href="{{route('post.job')}}"><span class="fa fa-file-text-o"></span>New Job Offer</a></li>
            <li><a href="company-dashboard-jobs.html"><span class="fa fa-briefcase"></span>Manage Jobs</a></li>
            <li><a href="company-dashboard-candidates.html"><span class="fa fa-user-circle-o"></span>Candidates</a></li>
            <li><a href="company-dashboard-subscriptions.html"><span class="fa fa-credit-card"></span>Subscriptions</a>
            </li>

            <li><a href="company-dashboard-password.html"><span class="fa fa-lock"></span>Change Password</a></li>
        </ul>
        <div class="pxp-dashboard-side-label mt-3 mt-lg-4">Insights</div>
        <ul class="list-unstyled">
            <li>
                <a href="company-dashboard-inbox.html" class="d-flex justify-content-between align-items-center">
                    <div><span class="fa fa-envelope-o"></span>Inbox</div>
                    <span class="badge rounded-pill">14</span>
                </a>
            </li>
            <li>
                <a href="company-dashboard-notifications.html"
                    class="d-flex justify-content-between align-items-center">
                    <div><span class="fa fa-bell-o"></span>Notifications</div>
                    <span class="badge rounded-pill">5</span>
                </a>
            </li>
        </ul>
    </nav>

    <nav class="pxp-dashboard-side-user-nav-container">
        <div class="pxp-dashboard-side-user-nav">
            <div class="dropdown pxp-dashboard-side-user-nav-dropdown dropup">
                <a role="button" class="dropdown-toggle" data-bs-toggle="dropdown">
                    <div class="pxp-dashboard-side-user-nav-avatar pxp-cover"
                        style="background-image: url({{ asset('assets/images/company-logo-1.png') }});"></div>
                    <div class="pxp-dashboard-side-user-nav-name">Artistre Studio</div>
                </a>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="company-dashboard.html">Dashboard</a></li>
                    <li><a class="dropdown-item" href="company-dashboard-profile.html">Edit profile</a></li>
                    <li><a class="dropdown-item" href="{{ route('logout') }}">Logout</a></li>
                </ul>
            </div>
        </div>
    </nav>
</div>
@endemployer

@candidate
<div class="pxp-dashboard-side-panel d-none d-lg-block">
    <div class="pxp-logo">
        <a href="{{route('home')}}" class="pxp-animate"><span style="color: var(--pxpMainColor)">j</span>obster</a>
    </div>

    <nav class="mt-3 mt-lg-4 d-flex justify-content-between flex-column pb-100">
        <div class="pxp-dashboard-side-label">Admin tools</div>
        <ul class="list-unstyled">
            <li class="pxp"><a href="{{route('dashboard')}}"><span class="fa fa-home"></span>Dashboard</a></li>
            <li><a href="{{route('edit.profile')}}"><span class="fa fa-pencil"></span>Edit Profile</a></li>
            <li><a href="candidate-dashboard-applications.html"><span class="fa fa-file-text-o"></span>Apllications</a></li>
            <li><a href="candidate-dashboard-fav-jobs.html"><span class="fa fa-heart-o"></span>Favourite Jobs</a></li>
            <li><a href="candidate-dashboard-password.html"><span class="fa fa-lock"></span>Change Password</a></li>
        </ul>
        <div class="pxp-dashboard-side-label mt-3 mt-lg-4">Insights</div>
        <ul class="list-unstyled">
            <li>
                <a href="candidate-dashboard-inbox.html" class="d-flex justify-content-between align-items-center">
                    <div><span class="fa fa-envelope-o"></span>Inbox</div>
                    <span class="badge rounded-pill">14</span>
                </a>
            </li>
            <li>
                <a href="candidate-dashboard-notifications.html" class="d-flex justify-content-between align-items-center">
                    <div><span class="fa fa-bell-o"></span>Notifications</div>
                    <span class="badge rounded-pill">5</span>
                </a>
            </li>
        </ul>
    </nav>

    <nav class="pxp-dashboard-side-user-nav-container pxp-is-candidate">
        <div class="pxp-dashboard-side-user-nav">
            <div class="dropdown pxp-dashboard-side-user-nav-dropdown dropup">
                <a role="button" class="dropdown-toggle" data-bs-toggle="dropdown">
                    <div class="pxp-dashboard-side-user-nav-avatar pxp-cover" style="background-image: url({{asset('assets/images/avatar-1.jpg')}});"></div>
                    <div class="pxp-dashboard-side-user-nav-name">Derek Cotner</div>
                </a>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="{{route('dashboard')}}l">Dashboard</a></li>
                    <li><a class="dropdown-item" href="{{route('edit.profile')}}">Edit profile</a></li>
                    <li><a class="dropdown-item" href="{{route('logout')}}">Logout</a></li>
                </ul>
            </div>
        </div>
    </nav>
</div>
@endcandidate
