<!-- MENU SIDEBAR-->
<aside class="menu-sidebar d-none d-lg-block">
    <div class="logo">
        <a href="{{route('admin.')}}">
            <img src="{{ asset('images/icon/logo.png')}}" alt="LaraBase Admin" />
        </a>
    </div>
    <div class="menu-sidebar__content js-scrollbar1">
        <nav class="navbar-sidebar">
            <ul class="list-unstyled navbar__list">
                <li class="@if (Request::is('admin'))active @endif has-sub">
                    <a href="{{route('admin.')}}">
                        <i class="fas fa-tachometer-alt"></i>@lang('menu_dashboard')</a>
                </li>
                <li class="@if (Request::is('admin/menu'))active @endif has-sub">
                    <a class="js-arrow" href="{{route('admin.menu.index')}}">
                        <i class="fas fa-bars"></i>@lang('menu_menu')</a>
                </li>
                <li class="@if (Request::is('admin/page'))active @endif has-sub">
                    <a class="js-arrow" href="{{route('admin.page.index')}}">
                        <i class="fas fa-copy"></i>@lang('menu_pages')</a>
                </li>
                <li class="@if (Request::is('admin/category'))active @endif">
                    <a href="{{route('admin.category.index')}}">
                        <i class="fas fa-list-alt"></i>@lang('menu_categories')</a>
                </li>
                <li class="@if (Request::is('admin/media'))active @endif has-sub">
                    <a class="js-arrow @if (Request::is('admin/media/image') || Request::is('admin/media/file'))open @endif" href="#" {{--href="{{route('admin.media')}}"--}}>
                        <i class="fas fa-film"></i>@lang('menu_media')</a>
                    <ul class="list-unstyled navbar__sub-list js-sub-list" @if (Request::is('admin/media/image') || Request::is('admin/media/file') || Request::is('admin/media/banner'))style="display: block;" @endif>
                        <li class="@if (Request::is('admin/media/image'))active @endif">
                            <a href="{{route('admin.image.index')}}"><i class="fas fa-image"></i> @lang('menu_media_img')</a>
                        </li>
                        {{--<li class="@if (Request::is('admin/media/image'))active @endif">
                            <a href="{{route('admin.ajax.pagination')}}"><i class="fas fa-image"></i> @lang('menu_media_img') Ajax</a>
                        </li>--}}
                        <li class="@if (Request::is('admin/media/file'))active @endif">
                            <a href="{{route('admin.file.index')}}"><i class="fas fa-file"></i>@lang('menu_media_file')</a>
                        </li>
                        <li class="@if (Request::is('admin/media/banner'))active @endif">
                            <a href="{{route('admin.banner.index')}}"><i class="fas fa-images"></i>@lang('menu_media_banner')</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="{{route('admin.user.index')}}">
                        <i class="fas fa-users"></i>@lang('menu_users')</a>
                </li>
                <li class="@if (Request::is('admin/testimonial') || Request::is('admin/testimonial/create') || Request::is('admin/testimonial/edit'))active @endif ">
                    <a href="{{route('admin.testimonial.index')}}">
                        <i class="fas fa-comments"></i>@lang('menu_testimonials')</a>
                </li>
                <li class="@if (Request::is('admin/tag') || Request::is('admin/tag/create') || Request::is('admin/tag/edit'))active @endif ">
                    <a href="{{route('admin.tag.index')}}">
                        <i class="fas fa-tags"></i>@lang('menu_tags')</a>
                </li>
                <li>
                    <a href="{{route('admin.setting.index')}}">
                        <i class="fas fa-cog"></i>@lang('menu_settings')</a>
                </li>
                {{--
                <!-- ///////////////// -->
                <li>
                    <a href="{{route('admin.charts')}}">
                        <i class="fas fa-chart-bar"></i>@lang('menu_charts')</a>
                </li>
                <li>
                    <a href="{{route('admin.tables')}}">
                        <i class="fas fa-table"></i>@lang('menu_tables')</a>
                </li>
                <li>
                    <a href="{{route('admin.forms')}}">
                        <i class="far fa-check-square"></i>@lang('menu_forms')</a>
                </li>
                <li>
                    <a href="#">
                        <i class="fas fa-calendar-alt"></i>@lang('menu_calendar')</a>
                </li>
                <li>
                    <a href="{{route('admin.maps')}}">
                        <i class="fas fa-map-marker-alt"></i>@lang('menu_maps')</a>
                </li>
                <li class="has-sub">
                    <a class="js-arrow" href="#">
                        <i class="fas fa-copy"></i>@lang('menu_pages')</a>
                    <ul class="list-unstyled navbar__sub-list js-sub-list">
                        <li>
                            <a href="{{route('admin.login')}}">@lang('menu_login')</a>
                        </li>
                        <li>
                            <a href="{{route('admin.register')}}">@lang('menu_register')</a>
                        </li>
                        <li>
                            <a href="{{route('admin.forget')}}">@lang('menu_forget')</a>
                        </li>
                    </ul>
                </li>
                <li class="has-sub">
                    <a class="js-arrow" href="#">
                        <i class="fas fa-desktop"></i>@lang('menu_elements')</a>
                    <ul class="list-unstyled navbar__sub-list js-sub-list">
                        <li>
                            <a href="{{route('admin.buttons')}}">Button</a>
                        </li>
                        <li>
                            <a href="{{route('admin.badges')}}">Badges</a>
                        </li>
                        <li>
                            <a href="{{route('admin.tabs')}}">Tabs</a>
                        </li>
                        <li>
                            <a href="{{route('admin.cards')}}">Cards</a>
                        </li>
                        <li>
                            <a href="{{route('admin.alerts')}}">Alerts</a>
                        </li>
                        <li>
                            <a href="{{route('admin.bars')}}">Progress Bars</a>
                        </li>
                        <li>
                            <a href="{{route('admin.modals')}}">Modals</a>
                        </li>
                        <li>
                            <a href="{{route('admin.switchs')}}">Switchs</a>
                        </li>
                        <li>
                            <a href="{{route('admin.grids')}}">Grids</a>
                        </li>
                        <li>
                            <a href="{{route('admin.fontawesome')}}">Fontawesome Icon</a>
                        </li>
                        <li>
                            <a href="{{route('admin.typography')}}">Typography</a>
                        </li>
                    </ul>
                </li>
                <!-- ///////////////// -->
                --}}
            </ul>
        </nav>
    </div>
</aside>
<!-- END MENU SIDEBAR-->