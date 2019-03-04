@extends('front.main')
@section('title', 'Blog')
@section('content')

    <!--/ Intro Single star /-->
    <section class="intro-single">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-lg-8">
                    <div class="title-single-box">
                        <h1 class="title-single">Our latest blog posts</h1>
                        <span class="color-text-a">News and interesting stuff</span>
                    </div>
                </div>
                <div class="col-md-12 col-lg-4">
                    <nav aria-label="breadcrumb" class="breadcrumb-box d-flex justify-content-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{url('/')}}">Home</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">
                                Blog
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <!--/ Intro Single End /-->

    <!--/ News Grid Star /-->
    <section class="news-grid grid">
        <div class="container">
            <div class="row">
                @foreach ($pages as $page)
                    <div class="col-md-4">
                        @include('front.partials._articlelist')
                    </div>
                @endforeach
            </div>
            {{ $pages->links('vendor.pagination.simple') }}

        </div>
    </section>
    <!--/ News Grid End /-->


@endsection

