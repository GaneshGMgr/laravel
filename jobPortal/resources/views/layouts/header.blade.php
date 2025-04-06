<header class="pxp-header fixed-top">
    <div class="pxp-container" >
        <div class="pxp-header-container">
            <div class="pxp-logo pxp-light">
                <a href="index-2.html" class="pxp-animate">jobster</a>
            </div>
            <div class="pxp-nav-trigger pxp-light navbar d-xl-none flex-fill">
                <a role="button" data-bs-toggle="offcanvas" data-bs-target="#pxpMobileNav" aria-controls="pxpMobileNav">
                    <div class="pxp-line-1"></div>
                    <div class="pxp-line-2"></div>
                    <div class="pxp-line-3"></div>
                </a>
                <div class="offcanvas offcanvas-start pxp-nav-mobile-container" tabindex="-1" id="pxpMobileNav">
                    <div class="offcanvas-header">
                        <div class="pxp-logo">
                            <a href="index-2.html" class="pxp-animate"><span style="color: var(--pxpMainColor)">j</span>obster</a>
                        </div>
                        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                    </div>
                    <div class="offcanvas-body">
                        <nav class="pxp-nav-mobile">
                            <ul class="navbar-nav justify-content-end flex-grow-1">
                                <li class="nav-item dropdown">
                                    <a role="button" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Home</a>
                                </li>
                                <li class="nav-item dropdown">
                                    <a role="button" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">About Us</a>
                                    <ul class="dropdown-menu">
                                        <li class="nav-item"><a href="#">About us</a></li>
                                        <li class="nav-item"><a href="#">Message form Chairperson</a></li>
                                    </ul>
                                </li>
                                <li class="nav-item dropdown">
                                    <a role="button" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Services</a>
                                    <ul class="dropdown-menu">
                                        <li class="nav-item dropdown">
                                            <a role="button" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Companies List</a>
                                            <ul class="dropdown-menu">
                                                <li class="nav-item"><a href="#">Overseas Requirement</a></li>
                                                <li class="nav-item"><a href="#">Training & requirement</a></li>

                                            </ul>
                                        </li>
                                        <li class="nav-item dropdown">
                                            <a role="button" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Single Company</a>
                                            <ul class="dropdown-menu">
                                                <li class="nav-item"><a href="single-company-1.html">Wide Content</a></li>
                                                <li class="nav-item"><a href="single-company-2.html">Right Side Panel</a></li>
                                                <li class="nav-item"><a href="single-company-3.html">Center Boxed Content</a></li>
                                            </ul>
                                        </li>
                                        <li class="nav-item"><a href="company-dashboard.html">Company Dashboard</a></li>
                                    </ul>
                                </li>
                                <li class="nav-item dropdown">
                                    <a role="button" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Document</a>
                                    <ul class="dropdown-menu">
                                        <li class="nav-item dropdown">
                                            <a role="button" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Candidates List</a>
                                            <ul class="dropdown-menu">
                                                <li class="nav-item"><a href="candidates-list-1.html">Legal Documents</a></li>
                                                <li class="nav-item"><a href="candidates-list-2.html">Documents Category</a></li>

                                            </ul>
                                        </li>
                                        <li class="nav-item dropdown">
                                            <a role="button" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Single Candidate</a>
                                            <ul class="dropdown-menu">
                                                <li class="nav-item"><a href="single-candidate-1.html">Wide Content</a></li>
                                                <li class="nav-item"><a href="single-candidate-2.html">Right Side Panel</a></li>
                                                <li class="nav-item"><a href="single-candidate-3.html">Center Boxed Content</a></li>
                                            </ul>
                                        </li>
                                        <li class="nav-item"><a href="candidate-dashboard.html">Candidate Dashboard</a></li>
                                    </ul>
                                </li>
                                <li class="nav-item dropdown">
                                    <a role="button" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Country</a>
                                </li>
                                <li class="nav-item dropdown">
                                    <a role="button" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">News</a>
                                </li>
                                <li class="nav-item dropdown">
                                    <a role="button" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Contact Us</a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
            <nav class="pxp-nav pxp-light dropdown-hover-all d-none d-xl-block">
                <ul>
                    <li class="dropdown">
                        <a href="{{route('home')}}" class="dropdown-toggle">Home</a>

                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-bs-toggle="dropdown">About us</a>
                        <ul class="dropdown-menu">
                            @foreach ($aboutus_category as $data)
                            <li><a class="dropdown-item"  href="{{ route('about_us', $data->slug)}}">{{$data->title}}</a></li>
                            @endforeach
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-bs-toggle="dropdown">Services</a>
                        <ul class="dropdown-menu">
                            @foreach ($serviceCategory as $service)
                            <li><a class="dropdown-item" href="{{$service->route}}">{{$service->title}}</a></li>
                            @endforeach
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-bs-toggle="dropdown">Documents</a>
                        <ul class="dropdown-menu">
                            @foreach ($document as $info)
                            <li><a class="dropdown-item" href="{{$info->route}}">{{$info->title}}</a></li>
                            @endforeach
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="{{route('country.list')}}" class="dropdown-toggle" >Country</a>
                    </li>
                    <li class="dropdown">
                        <a href="{{route('news')}}" class="dropdown-toggle" >News</a>
                    </li>
                    <li class="dropdown">
                        <a href="{{route('contact.us')}}" class="dropdown-toggle" >Contact Us</a>
                    </li>
                </ul>
            </nav>

            @guest
            <nav class="pxp-user-nav d-none d-sm-flex">

                <a class="btn rounded-pill pxp-user-nav-trigger" data-bs-toggle="modal" href="#pxp-signin-modal" role="button">Sign in</a>
                <a class="btn rounded-pill pxp-user-nav-trigger" data-bs-toggle="modal" href="#pxp-signup-modal" role="button">Sign Up</a>
            </nav>
            @endguest

            @auth
            <nav class="pxp-user-nav d-none d-sm-flex">
                @employer
                <a href="{{route('post.job')}}" class="btn rounded-pill pxp-nav-btn">Post a Job</a>
                @endemployer
                <a class="btn rounded-pill pxp-user-nav-trigger" href="{{route('logout')}}">Log Out</a>
            </nav>
            @endauth

        </div>
    </div>
</header>
