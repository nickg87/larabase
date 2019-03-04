<div class="testimonials-box">
    <div class="row">
        <div class="col-sm-12 col-md-6">
            <div class="testimonial-img">
                <img src="@if ($testimonial->image)/images/testimonials/{{ $testimonial->image }}@else/frontend/img/no-image.jpg @endif" alt="{{$testimonial->from}}" title="{{$testimonial->from}}" class="img-fluid">
            </div>
        </div>
        <div class="col-sm-12 col-md-6">
            <div class="testimonial-ico">
                <span class="ion-ios-quote"></span>
            </div>
            <div class="testimonials-content">
                <p class="testimonial-text">
                    {{$testimonial->text}}
                </p>
            </div>
            <div class="testimonial-author-box">
                <img src="@if (is_file('images/testimonials/small-'.$testimonial->image ))/images/testimonials/small-{{ $testimonial->image }}@else/frontend/img/no-image.jpg @endif" alt="" class="testimonial-avatar">
                <h5 class="testimonial-author">{{$testimonial->from}}</h5>
            </div>
        </div>
    </div>
</div>