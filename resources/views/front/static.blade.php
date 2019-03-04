@extends('front.main')
@section('title', $page->title)
@section('content')

    <!--/ Intro Single star /-->
    <section class="intro-single">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-lg-12">
                    <div class="title-single-box">
                        <h1 class="title-single">{{$page->title}}</h1>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--/ Intro Single End /-->

    <!--/ News Single Star /-->
    <section class="news-single nav-arrow-b">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-md-12 col-lg-12 section-md-t3">
                    <div class="post-content color-text-a">
                        <p class="post-intro">
                            {!!$page->short!!}
                        </p>
                        {!!$page->body!!}
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--/ News Single End /-->


@endsection

