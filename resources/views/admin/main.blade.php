<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    @include('admin.partials._head')
</head>
<body class="animsition">
<div class="page-wrapper">
    @include('admin.partials._header_mobile')

    @include ('admin.partials._sidebar')

    <!-- PAGE CONTAINER-->
    <div class="page-container">
        @include('admin.partials._header_desktop')

        @yield('content')
        <!-- END PAGE CONTAINER-->
    </div>
    @include ('admin.partials._footer')
</div>
@yield('scripts')

</body>
</html>
<!-- end document-->