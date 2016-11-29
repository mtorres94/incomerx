<header class="main-header">
<!-- Logo -->
<a href="#" class="logo">
    <!-- mini logo for sidebar mini 50x50 pixels -->
    <span class="logo-mini">
        <img src="{{ asset('images/incomerx-icon-white.png') }}" alt="" width="30px" style="margin-top: -3px;"/>
    </span>
    <!-- logo for regular state and mobile devices -->
    <span class="logo-lg">
        <img src="{{ asset('images/incomerx-logo-white.png') }}" alt="" width="150px"/>
    </span>
</a>

<!-- Header Navbar: style can be found in header.less -->
<nav class="navbar navbar-static-top" role="navigation">
    <!-- Sidebar toggle button-->
    <a href="javascript:void(0)" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
    </a>

    <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    {{ Config::get('languages')[App::getLocale()] }}
                </a>
                <ul class="dropdown-menu">
                    @foreach (Config::get('languages') as $lang => $language)
                        @if ($lang != App::getLocale())
                            <li>
                                <a href="{{ route('lang.switch', $lang) }}">{{$language}}</a>
                            </li>
                        @endif
                    @endforeach
                </ul>
            </li>

            <!-- Messages: style can be found in dropdown.less-->
            <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <img src="{{ asset('images/user-icon-sm.png') }}" class="user-image" alt="User Image">
                    <span class="hidden-xs">{{ Auth::user()->name }}</span>
                </a>
                <ul class="dropdown-menu">
                <!-- User image -->
                    <li class="user-header">
                        <img src="{{ asset('images/user-icon-md.png') }}" class="img-circle" alt="User Image">
                        <p>
                        {{ Auth::user()->name }} - {{ Auth::user()->role }}
                        <small>{{ trans('panel.member').' '.Auth::user()->created_at }}</small>
                        </p>
                    </li>
                    <!-- Menu Footer-->
                    <li class="user-footer">
                        <div class="pull-right">
                            <a href="{{ url('/logout') }}" class="btn btn-default btn-flat">Cerrar sesion</a>
                        </div>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</nav>
</header>
