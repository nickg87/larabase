<!--/ Nav Star /-->
<nav class="navbar navbar-default navbar-trans navbar-expand-lg fixed-top">
    <div class="container">
        <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarDefault"
                aria-controls="navbarDefault" aria-expanded="false" aria-label="Toggle navigation">
            <span></span>
            <span></span>
            <span></span>
        </button>
        <a class="navbar-brand text-brand" href="{{route('home')}}">Lara<span class="color-b">Base</span></a>
        <button type="button" class="btn btn-link nav-search navbar-toggle-box-collapse d-md-none" data-toggle="collapse"
                data-target="#navbarTogglerDemo01" aria-expanded="false">
            <span class="fa fa-search" aria-hidden="true"></span>
        </button>
        <li class="navbar-collapse collapse justify-content-center" id="navbarDefault">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link active" href="{{route('home')}}">Home</a>
                </li>
                @foreach ($menusHeader as $menu)
                    @if (!$menu->parent)
                        @if ($menu->children_count>0)
                            <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                {{$menu->link}}
                            </a>
                            @if ($menu->children)
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                @foreach ($menu->children as $submenu)
                                    @if ($submenu->statics->count()==1)
                                    <a class="dropdown-item" href="{{route('static',$submenu->statics->first()->slug)}}">{{$submenu->link}}</a>
                                    @else
                                    <a class="dropdown-item" href="{{route('menu',$submenu->slug)}}">{{$submenu->link}}</a>
                                    @endif
                                @endforeach
                            </div>
                            @endif
                            </li>
                        @else
                            <li class="nav-item" >
                                @if ($menu->statics->count()==1)
                                    <a class="nav-link" href="{{route('static',$menu->statics->first()->slug)}}">{{$menu->link}}</a>
                                @else
                                    <a class="nav-link" href="{{route('menu',$menu->slug)}}">{{$menu->link}}</a>
                                @endif
                            </li>
                        @endif
                    @endif
                @endforeach
                <li class="nav-item">
                    <a class="nav-link" href="{{route('blog')}}">Blog</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('contact')}}">Contact</a>
                </li>
            </ul>
        </li>
    </div>
    <button type="button" class="btn btn-b-n navbar-toggle-box-collapse d-none d-md-block" data-toggle="collapse"
            data-target="#navbarTogglerDemo01" aria-expanded="false">
        <span class="fa fa-search" aria-hidden="true"></span>
    </button>
    </div>
</nav>
<!--/ Nav End /-->