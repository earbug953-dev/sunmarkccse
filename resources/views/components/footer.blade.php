<div class="col-6 col-md-3 col-lg-2">
  <div class="footer-heading">Markets</div>
  <a href="{{ route('forex') }}" class="footer-link {{ request()->routeIs('forex') ? 'light' : '' }}">Forex</a>
  <a href="{{ route('cryptos') }}" class="footer-link {{ request()->routeIs('cryptos') ? 'light' : '' }}">Cryptos</a>
  <a href="{{ route('shares') }}" class="footer-link {{ request()->routeIs('shares') ? 'light' : '' }}">Shares</a>
  <a href="{{ route('indices') }}" class="footer-link {{ request()->routeIs('indices') ? 'light' : '' }}">Indices</a>
  <a href="{{ route('energies') }}" class="footer-link {{ request()->routeIs('energies') ? 'light' : '' }}">Energies</a>
  <a href="{{ route('metals') }}" class="footer-link {{ request()->routeIs('metals') ? 'light' : '' }}">Metals</a>
</div>

<div class="col-6 col-md-3 col-lg-2">
  <div class="footer-heading">Trading</div>
  <a href="{{ route('platform') }}" class="footer-link {{ request()->routeIs('platform') ? 'light' : '' }}">Platform</a>
  <a href="{{ route('swaps') }}" class="footer-link {{ request()->routeIs('swaps') ? 'light' : '' }}">Swaps</a>
  <a href="{{ route('spreads') }}" class="footer-link {{ request()->routeIs('spreads') ? 'light' : '' }}">Spreads &amp; Commissions</a>
  <a href="{{ route('pamm') }}" class="footer-link {{ request()->routeIs('pamm') ? 'light' : '' }}">PAMM</a>
</div>

<div class="col-6 col-md-3 col-lg-2">
  <div class="footer-heading">Company</div>
  <a href="{{ route('about') }}" class="footer-link {{ request()->routeIs('about') ? 'light' : '' }}">About Us</a>
  <a href="{{ route('why-us') }}" class="footer-link {{ request()->routeIs('why-us') ? 'light' : '' }}">Why Us</a>
  <a href="{{ route('contact') }}" class="footer-link {{ request()->routeIs('contact') ? 'light' : '' }}">Contact Us</a>
  <a href="{{ route('contact') }}" class="footer-link">
    <i class="uil uil-whatsapp me-1"></i>WhatsApp
  </a>
</div>

<div class="col-6 col-md-3 col-lg-2">
  <div class="footer-heading">Legal</div>
  <a href="{{ route('privacy-policy') }}" class="footer-link {{ request()->routeIs('privacy-policy') ? 'light' : '' }}">Privacy Policy</a>
  <a href="{{ route('terms') }}" class="footer-link {{ request()->routeIs('terms') ? 'light' : '' }}">Terms of Service</a>
  <a href="{{ route('trade-certificate') }}" class="footer-link {{ request()->routeIs('trade-certificate') ? 'active' : '' }}">Trade Certificate</a>

  <div class="footer-heading mt-4">Account</div>
  <a href="{{ route('login') }}" class="footer-link {{ request()->routeIs('login') ? 'light' : '' }}">Login</a>
  <a href="{{ route('register') }}" class="footer-link {{ request()->routeIs('register') ? 'light' : '' }}">Sign Up</a>
</div>
