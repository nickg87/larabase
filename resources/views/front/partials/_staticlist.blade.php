<div class="row">
    <div class="col-md-4 col-lg-4">
        <img src="@if ($page->images->count()>0)/images/resized/{{ $page->images->first()->image }}@else/frontend/img/no-image.jpg @endif" alt="{{$page->title}}" title="{{$page->title}}" class="img-fluid">
    </div>
    <div class="col-md-8 col-lg-8">
        <div class="property-agent">
            <h4 class="title-agent"><a @if($page->isStatic()) href="{{route('static',$page->slug)}}" @else  href="{{route('blog.single',[$page->category->slug,$page->slug])}}"@endif>{{$page->title}}</a></h4>
            <p class="color-text-a">
                {!! $page->short !!}
            </p>
            <ul class="list-unstyled">
                <li class="d-flex justify-content-between">
                    <strong>&nbsp;</strong>
                    <span class="color-text-a">{{ getFromDateAttribute($page->created_at) }}</span>
                </li>
            </ul>

        </div>
    </div>
</div>