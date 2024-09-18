
<!-- ======= Header ======= -->
<header id="header" class="header d-flex align-items-center">
    <div class="d-flex align-items-center justify-content-between">
        <a href="{{ route('dashboard') }}" class="logo d-flex align-items-center">
            <img src="{{asset('dashboard/assets/img/logo.png')}}" alt="">
            <span class="d-none d-lg-block">{{ __('top-bar-dash.NiceAdmin') }}</span>
        </a>
        <i class="bi bi-list toggle-sidebar-btn"></i>
    </div>
    
    <!-- End Logo -->

    <div class="search-bar">
        <form class="search-form d-flex align-items-center" method="POST" action="#">
            <input type="text" name="query" placeholder="{{ __('top-bar-dash.Search') }}" title="Enter search keyword">
            <button type="submit" title="Search"><i class="bi bi-search"></i></button>
        </form>
    </div>
    <!-- End Search Bar -->


    <nav class="header-nav ms-auto">
    <ul class="d-flex align-items-center">
        <li class="nav-item d-block d-lg-none">
            <a class="nav-link nav-icon search-bar-toggle" href="#">
                <i class="bi bi-search"></i>
            </a>
        </li><!-- End Search Icon-->

        <li class="nav-item dropdown">
            <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
                <i class="bi bi-bell"></i>
                <span class="badge bg-primary badge-number">4</span>
            </a><!-- End Notification Icon -->

            <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow notifications">
                <!-- Notification items here -->
            </ul><!-- End Notification Dropdown Items -->
        </li><!-- End Notification Nav -->

        <li class="nav-item dropdown">
            <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
                <i class="bi bi-chat-left-text"></i>
                <span class="badge bg-success badge-number">3</span>
            </a><!-- End Messages Icon -->

            <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow messages">
                <!-- Message items here -->
            </ul><!-- End Messages Dropdown Items -->
        </li><!-- End Messages Nav -->
        

        <li class="nav-item dropdown pe-3">
            <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
                <img src="{{asset('dashboard/assets/img/profile-img.jpg')}}" alt="Profile" class="rounded-circle">
                <span class="d-none d-md-block dropdown-toggle ps-2">{{ __('top-bar-dash.profile.name') }}</span>
            </a><!-- End Profile Image Icon -->

            <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                <!-- Profile items here -->
            </ul>
        </li><!-- End Profile Nav -->

       
        <!-- End Language Dropdown -->

    </ul>
</nav>

<!-- Bootstrap JavaScript and Popper.js -->

    <!-- End Icons Navigation -->

</header>
<!-- End Header -->
