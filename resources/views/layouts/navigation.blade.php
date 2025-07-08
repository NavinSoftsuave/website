<nav class="navbar">
    <div class="navbar-container">
        <!-- Logo -->
        <div class="navbar-logo">
            <a href="{{ route('dashboard') }}">
                <img src="{{ asset('images/hello-world.png') }}" alt="Logo" class="logo-img">
                <span class="app-name">Tree Courses</span>
            </a>
        </div>

        <!-- Only show when logged in -->
        @auth
        <div class="navbar-links">
            <a href="{{ route('dashboard') }}"
               class="{{ request()->routeIs('dashboard') ? 'active' : '' }}">
                Dashboard
            </a>
            <a href="{{ route('courses.index') }}"
               class="{{ request()->routeIs('courses.index') ? 'active' : '' }}">
                Courses
            </a>
        </div>

       <div class="navbar-user">
         <a href="{{ route('profile.edit') }}">
            <span class="user-name">{{ Auth::user()->name }}</span>
         </a>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="logout-button">Logout</button>
            </form>
        </div>

        @endauth
    </div>
</nav>
