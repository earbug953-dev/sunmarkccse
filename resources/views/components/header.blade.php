<!-- ── NAVBAR ── -->
<nav class="navbar navbar-expand-lg fixed-top">
  <div class="container">

    <!-- Logo -->
    <a class="navbar-brand" href="{{ route('home') }}">
      TESLA<span>.</span>INVEST
    </a>

    <!-- Mobile Toggle -->
    <button
      class="navbar-toggler border-0"
      type="button"
      data-bs-toggle="offcanvas"
      data-bs-target="#offcanvasNavbar"
      aria-controls="offcanvasNavbar"
      aria-label="Toggle navigation">
      <i class="uil uil-bars text-white fs-4"></i>
    </button>

    <!-- Offcanvas Menu -->
    <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar">

      <!-- Header -->
      <div class="offcanvas-header border-bottom">
        <span class="footer-brand">TESLA<span>.</span>INVEST</span>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas"></button>
      </div>

      <!-- Body -->
      <div class="offcanvas-body">
        <ul class="navbar-nav justify-content-end flex-grow-1 pe-3 gap-1">

          <!-- Home -->
          <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" href="{{ route('home') }}">
              Home
            </a>
          </li>

          <!-- About -->
          <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('about') ? 'active' : '' }}" href="{{ route('about') }}">
              About
            </a>
          </li>

          <!-- Markets -->
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle {{ request()->is('forex*','cryptos*','shares*','metals','Indices*','energies*') ? 'active' : '' }}" href="#" data-bs-toggle="dropdown">
              Markets
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item {{ request()->routeIs('forex') ? 'active' : '' }}" href="{{ route('forex') }}">Forex</a></li>
              <li><a class="dropdown-item {{ request()->routeIs('cryptos') ? 'active' : '' }}" href="{{ route('cryptos') }}">Cryptos</a></li>
              <li><a class="dropdown-item {{ request()->routeIs('shares') ? 'active' : '' }}" href="{{ route('shares') }}">Shares</a></li>
              <li><a class="dropdown-item {{ request()->routeIs('indices') ? 'active' : '' }}" href="{{ route('indices') }}">Indices</a></li>
              <li><a class="dropdown-item {{ request()->routeIs('energies') ? 'active' : '' }}" href="{{ route('energies') }}">Energies</a></li>
              <li><a class="dropdown-item {{ request()->routeIs('metals') ? 'active' : '' }}" href="{{ route('metals') }}">Metals</a></li>
            </ul>
          </li>

          <!-- Trading -->
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle {{ request()->is('platform*','swaps*','spreads*','pamm*') ? 'active' : '' }}" href="#" data-bs-toggle="dropdown">
              Trading
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item {{ request()->routeIs('platform ') ? 'active' : '' }}" href="{{ route('platform') }}">Platform</a></li>
              <li><a class="dropdown-item {{ request()->routeIs('swaps') ? 'active' : '' }}" href="{{ route('swaps') }}">Swaps</a></li>
              <li><a class="dropdown-item {{ request()->routeIs('spreads') ? 'active' : '' }}" href="{{ route('spreads') }}">Spreads & Commissions</a></li>
              <li><a class="dropdown-item {{ request()->routeIs('pamm') ? 'active' : '' }}" href="{{ route('pamm') }}">PAMM</a></li>
            </ul>
          </li>

          <!-- Company -->
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle {{ request()->is('why-us','contact') ? 'active' : '' }}" href="#" data-bs-toggle="dropdown">
              Company
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item {{ request()->routeIs('why-us') ? 'active' : '' }}" href="{{ route('why-us') }}">Why Us</a></li>
              <li><a class="dropdown-item {{ request()->routeIs('contact') ? 'active' : '' }}" href="{{ route('contact') }}">Contact</a></li>
            </ul>
          </li>

          <!-- Mobile Auth Buttons -->
          <li class="nav-item d-lg-none mt-4 d-grid gap-2">
            @guest
              <a href="{{ route('login') }}" class="btn-outline-ghost text-center">Login</a>
              <a href="{{ route('register') }}" class="btn-red text-center">Sign Up</a>
            @else
              <a href="{{ route('user.dashboard') }}" class="btn-red text-center">Dashboard</a>
            @endguest
          </li>

        </ul>
      </div>
    </div>

    <!-- Desktop Auth Buttons -->
    <div class="d-none d-lg-flex align-items-center gap-3">
      @guest
        <a href="{{ route('login') }}" class="btn-outline-ghost">Login</a>
        <a href="{{ route('register') }}" class="btn-red">Sign Up</a>
      @else
        <a href="{{ route('user.dashboard') }}" class="btn-red">Dashboard</a>
      @endguest
    </div>

  </div>
</nav>
