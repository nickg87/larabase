    @include('front.partials._head')
    @include('front.partials._searchbox')
    @include('front.partials._nav')
    @if (Request::is('/')) @include('front.partials._carousel') @endif
    @yield('content')
    <!-- END PAGE CONTAINER-->
    @include ('front.partials._footer')
