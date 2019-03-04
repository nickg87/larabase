@extends('front.main')
@section('title', 'Tag')
@section('content')

    <!--/ Intro Single star /-->
    <section class="intro-single">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-lg-8">
                    <div class="title-single-box">
                        <h1 class="title-single">#{{$tag->name}}</h1>
                    </div>
                </div>
                <div class="col-md-12 col-lg-4">
                    <nav aria-label="breadcrumb" class="breadcrumb-box d-flex justify-content-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{url('/')}}">Home</a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="{{url('/')}}">#tag</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">
                                <a href="#">{{$tag->name}}</a>
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
                @if ($tag->pages->count()>0)
                @foreach ($tag->pages as $page)
                    <div class="col-md-4">
                    @include('front.partials._articlelist')
                    </div>
                @endforeach
                @else
                    <div class="col-md-12">
                        <p>No pages found for this tag</p>
                    </div>
                @endif
            </div>

        </div>
    </section>
    <!--/ News Grid End /-->


@endsection

