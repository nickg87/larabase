<!-- HEADER DESKTOP-->
<header class="header-desktop">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="pull-left">
                {{-- --}}
            </div>
            <div class="pull-right">
            <div class="header-wrap">
                {{--
                <form class="form-header" action="" method="POST">
                    <input class="au-input au-input--xl" type="text" name="search" placeholder="Search for datas &amp; reports..." />
                    <button class="au-btn--submit" type="submit">
                        <i class="zmdi zmdi-search"></i>
                    </button>
                </form>
                --}}

                <div class="header-button">
                    <div class="noti-wrap">
                        <div class="noti__item js-item-menu">
                            <img height="24" src="{!! asset('backend/images/icon/flag-'.app()->getLocale().'.png') !!}" alt="English" />
                            <div class="lang-dropdown js-dropdown">
                                <div class="lang__title">
                                    <p>@lang('change_language')</p>
                                </div>
                                @foreach (config('app.locales') as $alpha2=>$lang)
                                    <div class="lang__item">
                                        <div class="image img-32">
                                            <img src="{{asset('backend/images/icon/flag-'.$alpha2.'.png')}}" alt="<?=$lang?>" />
                                        </div>
                                        <div class="content">
                                            <p><a href="{{url('backend//language/'.$alpha2)}}"><?=$lang?></a></p>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>

                    <div class="account-wrap">
                        <div class="account-item clearfix js-item-menu">
                            <div class="image">
                                <img src="{!! Auth::user()->avatar() !!}" alt="John Doe" />
                            </div>
                            <div class="content">
                                <a class="js-acc-btn" href="#">@if(Auth::check()) {{ Auth::user()->name }} @else User @endif</a>
                            </div>
                            <div class="account-dropdown js-dropdown">
                                <div class="info clearfix">
                                    <div class="image">
                                        <a href="#">
                                            <img src="{!! Auth::user()->avatar() !!}" alt="John Doe" />
                                        </a>
                                    </div>
                                    <div class="content">
                                        <h5 class="name">
                                            <a href="#">@if(Auth::check()) {{ Auth::user()->name }}@else User @endif </a>
                                        </h5>
                                        <span class="email">@if(Auth::check()) {{ Auth::user()->email }}@endif</span>
                                    </div>
                                </div>
                                <div class="account-dropdown__body">
                                    <div class="account-dropdown__item">
                                        <a href="{{route('admin.user.edit',Auth::user()->id)}}">
                                            <i class="zmdi zmdi-account"></i>@lang('account')</a>
                                    </div>
                                    <div class="account-dropdown__item">
                                        <a href="{{route('admin.setting.index')}}">
                                            <i class="zmdi zmdi-settings"></i>@lang('settings')</a>
                                    </div>
                                    {{--<div class="account-dropdown__item">
                                        <a href="#">
                                            <i class="zmdi zmdi-money-box"></i>@lang('billing')</a>
                                    </div>--}}
                                </div>
                                <div class="account-dropdown__footer">
                                    <a href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        <i class="zmdi zmdi-power"></i>@lang('logout')</a>
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            </div>
        </div>
    </div>
</header>
<!-- HEADER DESKTOP-->