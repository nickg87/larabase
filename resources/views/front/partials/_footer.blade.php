<!--/ footer Star /-->
<section class="section-footer">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-4">
                <div class="widget-a">
                    <div class="w-header-a">
                        <h3 class="w-title-a text-brand">{{$settings->name}}</h3>
                    </div>
                    <div class="w-body-a">
                        <p class="w-text-a color-text-a">
                            {!!$settings->description!!}
                        </p>
                    </div>
                    <div class="w-footer-a">
                        <ul class="list-unstyled">
                            <li class="color-a">
                                <span class="color-text-a">Phone: </span> {{$settings->phone}}</li>
                            <li class="color-a">
                                <span class="color-text-a">Email: </span> {{$settings->email}}</li>
                        </ul>
                    </div>
                </div>
            </div>
            @foreach ($menusFooter as $menu)
            @if (!$menu->parent)
            <div class="col-sm-12 col-md-4 section-md-t3">
                <div class="widget-a">
                    @if ($menu->children_count>0)
                    <div class="w-header-a">
                        <h3 class="w-title-a text-brand">{{$menu->link}}</h3>
                    </div>
                    @if ($menu->children)
                    <div class="w-body-a">
                        <div class="w-body-a">
                            <ul class="list-unstyled">
                                @foreach ($menu->children as $submenu)
                                    <li class="item-list-a">
                                        @if ($submenu->statics->count()==1)
                                            <i class="fa fa-angle-right"></i> <a href="{{route('static',$submenu->statics->first()->slug)}}">{{$submenu->link}}</a>
                                        @else
                                            <i class="fa fa-angle-right"></i> <a href="{{route('menu',$submenu->slug)}}">{{$submenu->link}}</a>
                                        @endif
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    @endif
                    @endif
                </div>
            </div>
            @endif
            @endforeach
        </div>
    </div>
</section>

<footer>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <nav class="nav-footer">
                    <ul class="list-inline">
                        <li class="list-inline-item">
                            <a href="#">Home</a>
                        </li>
                        @foreach ($menusFooterNav as $menu)
                        @if (!$menu->parent)
                        <li class="list-inline-item">
                            @if ($menu->statics->count()==1)
                                <a href="{{route('static',$menu->statics->first()->slug)}}">{{$menu->link}}</a>
                            @else
                                <a href="{{route('menu',$menu->slug)}}">{{$menu->link}}</a>
                            @endif
                        </li>
                        @endif
                        @endforeach
                        <li class="list-inline-item">
                            <a href="{{route('blog')}}">Blog</a>
                        </li>
                        <li class="list-inline-item">
                            <a href="{{route('login')}}">Login</a>
                        </li>
                        <li class="list-inline-item">
                            <a href="{{route('contact')}}">Contact</a>
                        </li>
                    </ul>
                </nav>
                <div class="socials-a">
                    <ul class="list-inline">
                        <li class="list-inline-item">
                            <a href="#">
                                <i class="fa fa-facebook" aria-hidden="true"></i>
                            </a>
                        </li>
                        <li class="list-inline-item">
                            <a href="#">
                                <i class="fa fa-twitter" aria-hidden="true"></i>
                            </a>
                        </li>
                        <li class="list-inline-item">
                            <a href="#">
                                <i class="fa fa-instagram" aria-hidden="true"></i>
                            </a>
                        </li>
                        <li class="list-inline-item">
                            <a href="#">
                                <i class="fa fa-pinterest-p" aria-hidden="true"></i>
                            </a>
                        </li>
                        <li class="list-inline-item">
                            <a href="#">
                                <i class="fa fa-dribbble" aria-hidden="true"></i>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="copyright-footer">
                    <p class="copyright color-text-a">
                        &copy; Copyright 2019
                        <span class="color-a">{{$settings->name}}</span> All Rights Reserved.
                    </p>
                </div>
                <div class="credits">
                    Theme by <a href="https://bootstrapmade.com/">BootstrapMade</a>
                </div>
            </div>
        </div>
    </div>
</footer>
<!--/ Footer End /-->

<a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
<div id="preloader"></div>
@include('front.partials._foot')
