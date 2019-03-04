<!-- HEADER MOBILE-->
<header class="header-mobile d-block d-lg-none">
    <div class="header-mobile__bar">
        <div class="container-fluid">
            <div class="header-mobile-inner">
                <a class="logo" href="{{route('admin.')}}">
                    <img src="{{ asset('images/icon/logo.png')}}" alt="CoolAdmin" />
                </a>
                <button class="hamburger hamburger--slider" type="button">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                </button>
            </div>
        </div>
    </div>
    <nav class="navbar-mobile">
        <div class="container-fluid">
            <ul class="navbar-mobile__list list-unstyled">
                <li class="has-sub">
                    <a class="js-arrow" href="{{route('admin.')}}">
                        <i class="fas fa-tachometer-alt"></i>@lang('menu_dashboard')</a>
                </li>
                <li>
                    <a href="chart.html">
                        <i class="fas fa-chart-bar"></i>@lang('menu_charts')</a>
                </li>
                <li>
                    <a href="table.html">
                        <i class="fas fa-table"></i>@lang('menu_tables')</a>
                </li>
                <li>
                    <a href="form.html">
                        <i class="far fa-check-square"></i>@lang('menu_forms')</a>
                </li>
                <li>
                    <a href="#">
                        <i class="fas fa-calendar-alt"></i>@lang('menu_calendar')</a>
                </li>
                <li>
                    <a href="map.html">
                        <i class="fas fa-map-marker-alt"></i>@lang('menu_maps')</a>
                </li>
                <li class="has-sub">
                    <a class="js-arrow" href="#">
                        <i class="fas fa-copy"></i>@lang('menu_pages')</a>
                    <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                        <li>
                            <a href="login.html">@lang('menu_login')</a>
                        </li>
                        <li>
                            <a href="register.html">@lang('menu_register')</a>
                        </li>
                        <li>
                            <a href="forget-pass.html">@lang('menu_forget')</a>
                        </li>
                    </ul>
                </li>
                <li class="has-sub">
                    <a class="js-arrow" href="#">
                        <i class="fas fa-desktop"></i>@lang('menu_elements')</a>
                    <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                        <li>
                            <a href="button.html">Button</a>
                        </li>
                        <li>
                            <a href="badge.html">Badges</a>
                        </li>
                        <li>
                            <a href="tab.html">Tabs</a>
                        </li>
                        <li>
                            <a href="card.html">Cards</a>
                        </li>
                        <li>
                            <a href="alert.html">Alerts</a>
                        </li>
                        <li>
                            <a href="progress-bar.html">Progress Bars</a>
                        </li>
                        <li>
                            <a href="modal.html">Modals</a>
                        </li>
                        <li>
                            <a href="switch.html">Switchs</a>
                        </li>
                        <li>
                            <a href="grid.html">Grids</a>
                        </li>
                        <li>
                            <a href="fontawesome.html">Fontawesome Icon</a>
                        </li>
                        <li>
                            <a href="typo.html">Typography</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
</header>
<!-- END HEADER MOBILE-->