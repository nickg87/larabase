@extends('front.main')
@section('title', $page->title)
@section('content')

    <!--/ Intro Single star /-->
    <section class="intro-single">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-lg-6">
                    <div class="title-single-box">
                        <h1 class="title-single">{{$page->title}}</h1>
                        <span class="color-text-a">@if(!empty($page->category)){{$page->category->name}}@endif</span>
                    </div>
                </div>
                <div class="col-md-12 order-first order-lg-1  col-lg-6">
                    <nav aria-label="breadcrumb" class="breadcrumb-box d-flex justify-content-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{url('/')}}">Home</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">
                                <a href="{{route('blog.category',$page->category->slug)}}">{{$page->category->name}}</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">
                                <a href="#">{{$page->title}}</a>
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <!--/ Intro Single End /-->

    <!--/ News Single Star /-->
    <section class="news-single nav-arrow-b">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-md-4 ">
                    <div class="property-summary">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="title-box-d section-t4">
                                    <h3 class="title-d">Categories</h3>
                                </div>
                            </div>
                        </div>
                        <div class="summary-list">
                            <ul class="list">
                                @foreach ($categories as $category)
                                    <li class="d-flex justify-content-between">
                                        <a href="{{route('blog.category',$category->slug)}}"><strong>{{$category->name}}</strong></a>
                                        <span>{{$category->posts_count}} articles</span>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-8 order-first order-md-2 section-md-t3">
                    @if ($page->images->count()>1)
                        <div id="property-single-carousel" class="owl-carousel owl-arrow gallery-property">
                            <?php $cntr=0; ?>
                            @foreach ($page->images as $image) <?php $cntr++; ?>
                            <div class="carousel-item-b">
                                <img src="/images/original/{{ $image->image }}" title="{{$page->title.' - image '.$cntr}}" alt="{{$page->title.' Image '.$cntr}}">
                            </div>
                            @endforeach
                        </div>
                    @elseif ($page->images->count()==1)
                        <div class="news-img-box">
                            <img src="/images/original/{{$page->images->first()->image}}" alt="" class="img-fluid">
                        </div>
                    @endif

                    <div class="post-information">
                        <ul class="list-inline text-center color-a">
                            @if ($page->author)
                            <li class="list-inline-item mr-2">
                                <strong>Author: </strong>
                                <span class="color-text-a"><a href="{{route('author',[$page->author->id,getFormatUri($page->author->name,'-')])}}"> {{$page->author->name}}</a></span>
                            </li>
                            @endif
                            @if(!empty($page->category))
                                <li class="list-inline-item mr-2">

                                    <strong>Category: </strong>
                                    <span class="color-text-a">{{$page->category->name}}</span>
                                </li>
                            @endif
                            <li class="list-inline-item">
                                <strong>Last update: </strong>
                                <span class="color-text-a">{{ getFromDateAttribute($page->updated_at) }}</span>
                            </li>
                            @if ($page->tags->count())
                                <li class="list-inline-item card-header-tag m-2">
                                    <strong>Tags: </strong>
                                    <span class="card-category-tag">
                                        @foreach($page->tags as $tag)
                                            <a href="{{route('tag',[$tag->id,getFormatUri($tag->name)])}}" class="tag-b">#{{$tag->name}}</a>
                                        @endforeach
                                    </span>
                                </li>
                            @endif
                        </ul>
                    </div>
                    <div class="post-content color-text-a">
                        <p class="post-intro">
                            {!!$page->short!!}
                        </p>
                        {!!$page->body!!}
                    </div>
                    <div class="row">
                        @include('front.partials._comments')
                    </div>
                </div>
            </div>


        </div>
    </section>
    <!--/ News Single End /-->


@endsection

