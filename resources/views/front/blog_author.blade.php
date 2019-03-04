@extends('front.main')
@section('title', 'Blog')
@section('content')

    <!--/ Intro Single star /-->
    <section class="intro-single">
        <div class="container">
            <div class="row">
                @include('front.partials._author')
            </div>
        </div>
    </section>
    <!--/ Intro Single End /-->

    <!--/ News Grid Star /-->

    <section class="news-grid grid">
        <div class="container">
            <div class="row section-t3">
                <div class="col-sm-12">
                    <div class="title-box-d">
                        <h3 class="title-d">Articles by  {{$author->name}}</h3>
                    </div>
                </div>
            </div>
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

