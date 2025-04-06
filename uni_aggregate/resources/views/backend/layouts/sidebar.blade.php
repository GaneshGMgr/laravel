<div class="app-menu navbar-menu">
    <!-- LOGO -->
    <div class="navbar-brand-box">
        <!-- Dark Logo-->
        <a href="index.html" class="logo logo-dark">
            <span class="logo-sm">
                <img src="assets/images/logo-sm.png" alt="" height="22">
            </span>
            <span class="logo-lg">
                <img src="assets/images/logo-dark.png" alt="" height="17">
            </span>
        </a>
        <!-- Light Logo-->
        <a href="index.html" class="logo logo-light">
            <span class="logo-sm">
                <img src="assets/images/logo-sm.png" alt="" height="22">
            </span>
            <span class="logo-lg">
                <img src="assets/images/logo-light.png" alt="" height="17">
            </span>
        </a>
        <button type="button" class="btn btn-sm p-0 fs-20 header-item float-end btn-vertical-sm-hover"
            id="vertical-hover">
            <i class="ri-record-circle-line"></i>
        </button>
    </div>

    <div id="scrollbar">
        <div class="container-fluid">

            <div id="two-column-menu">
            </div>
            <ul class="navbar-nav" id="navbar-nav">
                <li class="menu-title"><span data-key="t-menu">Menu</span></li>
                <li class="nav-item">
                    <a class="nav-link menu-link" href="{{route('dashboard')}}" >
                        <i class="ri-dashboard-2-line"></i> <span data-key="t-dashboards">Dashboards</span>
                    </a>

                </li> <!-- end Dashboard Menu -->

          <!-- end Dashboard Menu -->

                <li class="menu-title"><i class="ri-more-fill"></i> <span data-key="t-pages">Pages</span></li>



                <li class="nav-item">
                    <a class="nav-link menu-link" href="{{route('index.course_master')}}" >
                        <i class="ri-dashboard-2-line"></i> <span >Add courses</span>
                    </a>

                </li>

                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebaruni"data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebaruni"> <i class="ri-dashboard-2-line"></i> <span>University</span>
                    </a>

                    <div class="collapse menu-dropdown show" id="sidebaruni">
                        <ul class="nav nav-sm flex-column">

                            <li class="nav-item">
                                <a href="{{route('uni_list')}}" class="nav-link" data-key="t-crm"> Universities List </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('add.uni')}}" class="nav-link" data-key="t-analytics">
                                    Add Universities </a>
                            </li>


                        </ul>
                    </div>

                </li>
                <li class="nav-item">
                    <a class="nav-link menu-link" href="{{route('courses.index')}}" >
                        <i class="ri-dashboard-2-line"></i> <span>Courses By University</span>
                    </a>

                </li>



                <li class="nav-item">
                    <a class="nav-link menu-link" href="{{route('level')}}" >
                        <i class="ri-dashboard-2-line"></i> <span >Level</span>
                    </a>

                </li>
                <li class="nav-item">
                    <a class="nav-link menu-link" href="{{route('add.states')}}" >
                        <i class="ri-dashboard-2-line"></i> <span >States</span>
                    </a>

                </li>
                <li class="nav-item">
                    <a class="nav-link menu-link" href="{{route('faculty')}}" >
                        <i class="ri-dashboard-2-line"></i> <span >Faculty</span>
                    </a>

                </li>
                <li class="nav-item">
                    <a class="nav-link menu-link" href="{{route('board')}}" >
                        <i class="ri-dashboard-2-line"></i> <span >Board</span>
                    </a>

                </li>
                <li class="nav-item">
                    <a class="nav-link menu-link" href="{{route('eligibility.index')}}" >
                        <i class="ri-dashboard-2-line"></i> <span >Eligibility</span>
                    </a>

                </li>
                <li class="nav-item">
                    <a class="nav-link menu-link" href="{{route('stream')}}" >
                        <i class="ri-dashboard-2-line"></i> <span >Stream</span>
                    </a>

                </li>
                <li class="nav-item">
                    <a class="nav-link menu-link" href="{{route('consultancy.index')}}" >
                        <i class="ri-dashboard-2-line"></i> <span >Consultancy</span>
                    </a>

                </li>
                <li class="nav-item">
                    <a class="nav-link menu-link" href="{{route('test')}}" >
                        <i class="ri-dashboard-2-line"></i> <span >Test</span>
                    </a>

                </li>
                <li class="nav-item">
                    <a class="nav-link menu-link" href="{{route('faq')}}" >
                        <i class="ri-dashboard-2-line"></i> <span >FAQ</span>
                    </a>

                </li>

                </li>
                    <a class="nav-link menu-link" href="{{route('info')}}" >
                        <i class="ri-dashboard-2-line"></i> <span >Info</span>
                    </a>

                </li>
                <li class="nav-item">
                    <a class="nav-link menu-link" href="{{route('site_setting')}}" >
                        <i class="ri-dashboard-2-line"></i> <span >Site Setting</span>
                    </a>

                </li>
                <li class="nav-item">
                    <a class="nav-link menu-link" href="{{route('edit.aboutUs')}}" >
                        <i class="ri-dashboard-2-line"></i> <span >About Us</span>
                    </a>

                </li>


            </ul>
        </div>
        <!-- Sidebar -->
    </div>

    <div class="sidebar-background"></div>
</div>
