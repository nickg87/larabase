<div class="card-box-b card-shadow news-box">
    <div class="img-box-b">
        <img src="@if ($page->images->count()>0)/images/resized/{{ $page->images->first()->image }}@else/frontend/img/no-image.jpg @endif" alt="{{$page->title}}" title="{{$page->title}}" class="img-b img-fluid">
    </div>
    <div class="card-overlay">
        <div class="card-header-b">
            @if ($page->tags->count())
                <div class="card-category-b">
                    @foreach($page->tags->take(2) as $tag)
                        <a href="{{route('tag',[$tag->id,getFormatUri($tag->name)])}}" class="category-b">#{{$tag->name}}</a>
                    @endforeach
                </div>
            @endif
            <div class="card-title-b">
                <h3 class="title-2">
                    <a @if($page->isStatic()) href="{{route('static',$page->slug)}}" @else  href="{{route('blog.single',[$page->category->slug,$page->slug])}}"@endif>{{$page->title}}</a>
                </h3>
            </div>
            <div class="card-date">
                <span class="date-b">{{ getFromDateAttribute($page->created_at) }}</span>
            </div>
        </div>
    </div>
</div>