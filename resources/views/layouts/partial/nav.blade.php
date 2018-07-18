<!-- ========== TOP MENU ========== -->
<div class="top_menu transparent hidden-xs">
    <div class="container">
        <div class="welcome_mssg hidden-xs">
            {{ $setting->welcome_title }}
            {{ $setting->welcome_content }}
        </div>
        <ul class="top_menu_right">
            <li><i class="fa  fa-phone"></i><a href="tel:18475555555"> 1-888-123-4567 </a></li>
            <li class="email"><i class="fa  fa-envelope-o "></i>
                <a href="mailto:contact@site.com">water@site .com</a>
            </li>
            <li class="language-switcher">
                <nav class="dropdown">
                    <a href="#" class="dropdown-toggle select" data-hover="dropdown" data-toggle="dropdown">
                        <i class="famfamfam-flag-gb "></i>English<b class="caret"></b>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a href="#"><i class="famfamfam-flag-it "></i>Italiano</a></li>
                        <li><a href="#"><i class="famfamfam-flag-de "></i>Deutsch</a></li>
                        <li><a href="#"><i class="famfamfam-flag-fr "></i>Français</a></li>
                        <li><a href="#"><i class="famfamfam-flag-es "></i>Español</a></li>
                    </ul>
                </nav>
            </li>
        </ul>
    </div>
</div>


<!-- ========== HEADER ========== -->
<header class="fixed transparent">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle mobile_menu_btn" data-toggle="collapse"
                    data-target=".mobile_menu" aria-expanded="false">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand light" href="{{ route('index') }}">
                {{--<img src="images/logo_light.svg" height="32" alt="Logo">--}}
            </a>
            <a class="navbar-brand dark nodisplay" href="{{ route('index') }}">
                {{--<img src="images/logo.svg" height="32" alt="Logo">--}}
            </a>
        </div>
        <nav id="main_menu" class="mobile_menu navbar-collapse">
            <ul class="nav navbar-nav">
                <li><a href="{{ route('index') }}">HOME</a></li>
                <li><a href="{{ route('rooms.index') }}">LIST</a></li>
                @if (Auth::user()->is_admin)
                    <li><a href="{{ url('admin') }}">Admin</a></li>
                @endif
            </ul>
        </nav>
    </div>
</header>