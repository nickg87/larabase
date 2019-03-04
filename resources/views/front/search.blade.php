@extends('front.main')
@section('title', 'Blog')
@section('content')

    <!--/ Intro Single star /-->
    <section class="intro-single">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-lg-12">
                    <div class="title-single-box">
                        <h1 class="title-single">Search results</h1>
                        <span class="color-text-a">keyword: {{$keyword}}</span>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--/ Intro Single End /-->

    <!--/ News Grid Star /-->
    <section class="news-grid grid">
        <div class="container">


        @if (!empty($result))
            <div class="row">

                @foreach ($result as $page)
                    <div class="col-md-4">
                        @include('front.partials._articlelist')
                    </div>
                @endforeach
            </div>
            {{ $result->links('vendor.pagination.simple') }}
        @elseif(isset($message))
                <p>{{ $message }}</p>
            @endif

        </div>
    </section>
    <!--/ News Grid End /-->


@endsection

