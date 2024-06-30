<!-- resources/views/partials/nav.blade.php -->
<nav>
    <div class="container nav__container">
        <a href="{{ url('/index') }}" class="nav__logo">BLOG</a>
        <ul class="nav__items">
            <li><a href="{{ url('/blog') }}">Home</a></li>
            <li><a href="{{ url('/about') }}">About</a></li>
            <li><a href="{{ url('/services') }}">Services</a></li>
            <li><a href="{{ url('/contact') }}">Contact</a></li>
            @if($user)
                <li class="nav__profile">
                    <div class="avatar">
                        <img src="{{ asset('images/' . $user->avatar) }}" alt="User Avatar" />
                    </div>
                    <ul>
                        <li><a href="{{ url('/dashboard') }}">Dashboard</a></li>
                        <li>
                            <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                            <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </li>
                    </ul>
                </li>
            @else
                <li><a href="{{ url('/signin') }}">Signin</a></li>
            @endif
        </ul>
        <button id="open__nav-btn"><i class="uil uil-bars"></i></button>
        <button id="close__nav-btn"><i class="uil uil-multiply"></i></button>
    </div>
</nav>
