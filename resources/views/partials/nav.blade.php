<!-- resources/views/partials/nav.blade.php -->
<nav>
  <div class="container nav__container">
    <a href="{{ url('/') }}" class="nav__logo">BLOG</a>
    <ul class="nav__items">
      <li><a href="{{ url('/blog') }}">Blog</a></li>
      <li><a href="{{ url('/about') }}">About</a></li>
      <li><a href="{{ url('/service') }}">Service</a></li>
      <li><a href="{{ url('/contact') }}">Contact</a></li>
      <li><a href="{{ url('/signin') }}">Signin</a></li>
      <li><a href="{{ url('/dashboard') }}">Dashboard</a></li>
      <li><a href="{{ url('/logout') }}">Logout</a></li>
      <li class="nav__profile">
        <div class="avatar">
          <img src="{{ asset('images/avatar1.jpg') }}">
        </div>
      </li>
    </ul>
    <button id="open__nav-btn"><i class="uil uil-bars"></i></button>
    <button id="close__nav-btn"><i class="uil uil-multiply"></i></button>
  </div>
</nav>
