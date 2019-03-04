@extends('front.main')
@section('title', 'Home')
@section('content')

    <!-- MAIN CONTENT-->
    <!--/ News Star /-->
    <section class="section-news section-t8">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="title-wrap d-flex justify-content-between">
                        <div class="title-box">
                            <h2 class="title-a">Latest blog posts</h2>
                        </div>
                        <div class="title-link">
                            <a href="{{route('blog')}}">All posts
                                <span class="ion-ios-arrow-forward"></span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div id="new-carousel" class="owl-carousel owl-theme">
                    @foreach ($latest as $page)
                    <div class="carousel-item-c">
                        @include('front.partials._articlelist')
                    </div>
                    @endforeach
            </div>
        </div>
    </section>
    <!--/ News End /-->

    <!--/ Agents Star /-->
    <section class="section-agents section-t8">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="title-wrap d-flex justify-content-between">
                        <div class="title-box">
                            <h2 class="title-a">Best Authors</h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach ($authors as $author)
                    <div class="col-md-4">
                        @include('front.partials._authorlist')
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!--/ Agents End /-->


    @if ($testimonials)
    <!--/ Testimonials Star /-->
    <section class="section-testimonials section-t8 nav-arrow-a">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="title-wrap d-flex justify-content-between">
                        <div class="title-box">
                            <h2 class="title-a">Testimonials</h2>
                        </div>
                    </div>
                </div>
            </div>
            <div id="testimonial-carousel" class="owl-carousel owl-arrow">
                @foreach ($testimonials as $testimonial)
                <div class="carousel-item-a">
                    @include('front.partials._testimoniallist')
                </div>
                @endforeach
            </div>
        </div>
    </section>
    <!--/ Testimonials End /-->
    @endif




@endsection

