@if ($banners)
<!--/ Carousel Star /-->
<div class="intro intro-carousel">
    <div id="carousel" class="owl-carousel owl-theme">
        @foreach ($banners as $banner)
        <div class="carousel-item-a intro-item bg-image" style="background-image: url('/images/original/{{ $banner->image }}')">
            <div class="overlay overlay-a"></div>
            <div class="intro-content display-table">
                <div class="table-cell">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-8">
                                <div class="intro-body">
                                    <p class="intro-title-top">{{$banner->small}}</p>
                                    <h1 class="intro-title mb-4">{!! getFormatBannerTitle($banner->title) !!}</h1>
                                    <p class="intro-subtitle intro-price">
                                        <a href="#"><span class="price-a">{{$banner->button}}</span></a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
<!--/ Carousel end /-->
@endif
