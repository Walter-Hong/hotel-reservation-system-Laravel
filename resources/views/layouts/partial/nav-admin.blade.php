<nav class="navbar navbar-default">
    <div class="navbar-header">
        <!-- Collapsed Hamburger -->
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".app-navbar-collapse">
            <span class="sr-only">Toggle Navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>

        <!-- Branding Image -->
        <a class="navbar-brand" href="{{ url('/') }}">
            {{ $setting->company }}
        </a>
    </div>

    <ul class="nav navbar-nav">
        <li class="">
            <a href="{{ route('rooms.index') }}">Room List</a>
        </li>
    </ul>

    <ul class="nav navbar-top-links navbar-right">
        @if (Auth::check())
            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false">
                    <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                </a>
                <ul class="dropdown-menu dropdown-user">
                    <li>
                        <a href="{{ route('profile') }}"><i class="fa fa-user fa-fw"></i> profile</a>
                    </li>
                    @if (Auth::user()->is_admin)
                        <li>
                            <a href="{{ url('admin') }}"><i class="fa fa-dashboard fa-fw"></i> admin</a>
                        </li>
                    @endif
                    <li class="divider"></li>
                    <li>
                        <a href="{{ url('logout') }}"><i class="fa fa-sign-out fa-fw"></i> logout</a>
                    </li>
                </ul>
            </li>
        @else
            <li class="{{ isActive('login') }}">
                <a href="{{ url('login') }}">login</a>
            </li>
            <li class="{{ isActive('register') }}">
                <a href="{{ url('register') }}">register</a>
            </li>
        @endif
    </ul>

    @yield('sidebar')
</nav>
