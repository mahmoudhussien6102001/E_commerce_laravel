<header class="site-navbar" @if(Route::is('login') || Route::is('register')) role="banner" @endif>
  <div class="site-navbar-top">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-6 col-md-4 order-2 order-md-1 site-search-icon text-left">
          <form action="" class="site-block-top-search">
            <span class="icon icon-search2"></span>
            <input type="text" class="form-control border-0" placeholder="Search">
          </form>
        </div>
        <div class="col-12 mb-3 mb-md-0 col-md-4 order-1 order-md-2 text-center">
          <div class="site-logo">
            <a href="{{ route('home') }}" class="js-logo-clone">Shoppers</a>
          </div>
        </div>
        <div class="col-6 col-md-4 order-3 order-md-3 text-right">
          <div class="site-top-icons">
            <ul>
              @auth
                <li><a href="javascript:void(0)" class="text-decoration-none">{{ auth()->user()->name }}</a></li>
              @else
                <li><a class="text-decoration-none">{{ 'guest_'.uniqid() }}</a></li>
              @endauth
              @auth
                @if(auth()->user()->user_type === 'customer')
                <li><a href="#" class="text-decoration-none"><span class="icon icon-heart-o"></span></a></li>
                <li>
                  <a href="cart.html" class="site-cart">
                    <span class="icon icon-shopping_cart"></span>
                    <span class="count">4</span>
                  </a>
                </li>
                @endif
              @endauth
              <li class="dropdown">
                <a class="dropdown-toggle p-1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" aria-label="User Menu">
                  <span class="icon icon-person"></span>
                </a>
                <div class="dropdown-menu dropdown-menu-right">
                  @if(auth()->user())
                    <button class="dropdown-item" type="button">
                      <i class="fa-solid fa-user"></i> Profile Management
                    </button>
                    @if(auth()->user()->user_type === 'admin' || auth()->user()->user_type === 'moderator')
                      <button class="dropdown-item" type="button" onclick="window.location.href='{{route('dashboard')}}">
                        <i class="fa-solid fa-user"></i> Dashboard
                      </button>
                    @endif
                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                      Logout
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                      @csrf
                    </form>
                  @else
                    <button class="dropdown-item" type="button" onclick="window.location.href='{{ route('login') }}'">Login</button>
                    <button class="dropdown-item" type="button" onclick="window.location.href='{{ route('register') }}'">Register</button>
                  @endif
                </div>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
  <nav class="site-navigation text-right text-md-center" role="navigation">
    <div class="container">
      <ul class="site-menu js-clone-nav d-none d-md-block">
        <li class="has-children">
          <a href="{{ route('home') }}">Home</a>
          <ul class="dropdown">
            <li><a href="#">Menu One</a></li>
            <li><a href="#">Menu Two</a></li>
            <li><a href="#">Menu Three</a></li>
            <li class="has-children">
              <a href="#">Sub Menu</a>
              <ul class="dropdown">
                <li><a href="#">Menu One</a></li>
                <li><a href="#">Menu Two</a></li>
                <li><a href="#">Menu Three</a></li>
              </ul>
            </li>
          </ul>
        </li>
        <li class="has-children">
          <a href="{{ route('about') }}">About</a>
          <ul class="dropdown">
            <li><a href="#">Menu One</a></li>
            <li><a href="#">Menu Two</a></li>
            <li><a href="#">Menu Three</a></li>
          </ul>
        </li>
        <li><a href="{{ route('shop') }}">Shop</a></li>
        <li><a href="#">Catalogue</a></li>
        <li><a href="#">New Arrivals</a></li>
        <li><a href="{{ route('contactUs') }}">Contact</a></li>
      </ul>
    </div>
  </nav>
</header>
