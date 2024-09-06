<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">
        <li class="nav-item">
        <a class="nav-link " href="{{route('dashboard')}}">
            <i class="bi bi-grid"></i>
            <span>Dashboard</span>
          </a>
        </li>
        <!-- End Dashboard Nav -->
        <li class="nav-item">
        <a class="nav-link " href="{{route('home')}}">
            <i class="fa-solid fa-globe"></i>
            <span>website</span>
          </a>
        </li>
        <!-- End website Nav -->
       {{--Users--}}
        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
              <i class="bi bi-menu-button-wide"></i><span>Users</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
            <li>
                <a href="components-badges.html">
                    <i class="fa-solid fa-user-tie fs-5"></i><span>Admin</span>
                </a>
              </li>
              <li>
                <a href="components-breadcrumbs.html">
                    <i class="fa-solid fa-m fs-5"></i><span>Moderator</span>
                </a>
              </li>
              <li>
                <a href="components-buttons.html">
                    <i class="fa-brands fa-cuttlefish fs-5"></i><span>Customer</span>
                </a>
              </li>
              <li>
                <a href="components-cards.html">
                    <i class="fa-sharp fa-solid fa-i fs-5"></i><span>Index</span>
                </a>
              </li>
              <li>
                <a href="components-carousel.html">
                    <i class="fa-solid fa-plus fs-5"></i><span>Create</span>
                </a>
              </li>
            </ul>
        </li>

    {{--Categories--}}

    <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#Catogary-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-menu-button-wide"></i><span>Categories</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="Catogary-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">

            <li>
                <a href="components-cards.html">
                    <i class="fa-sharp fa-solid fa-i fs-5"></i><span>Index</span>
                </a>
              </li>
              <li>
                <a href="components-carousel.html">
                    <i class="fa-solid fa-plus fs-5"></i><span>Create</span>
                </a>
              </li>
        </ul>
    </li>
     {{--SubCategories--}}
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#SubCategories-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-menu-button-wide"></i><span>SubCategories</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="SubCategories-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">

            <li>
                <a href="components-cards.html">
                    <i class="fa-sharp fa-solid fa-i fs-5"></i><span>Index</span>
                </a>
              </li>
              <li>
                <a href="components-carousel.html">
                    <i class="fa-solid fa-plus fs-5"></i><span>Create</span>
                </a>
            </ul>
        </li>
              {{--products--}}
              <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#Products-nav" data-bs-toggle="collapse" href="#">
                  <i class="bi bi-menu-button-wide"></i><span>Products</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="Products-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
        
                    <li>
                        <a href="components-cards.html">
                            <i class="fa-sharp fa-solid fa-i fs-5"></i><span>Index</span>
                        </a>
                    </li>
                      <li>
                        <a href="components-carousel.html">
                            <i class="fa-solid fa-plus fs-5"></i><span>Create</span>
                        </a>
                      </li>
                </ul>
              </li>
        
        </ul>
    </li>




    </ul>
</aside>
