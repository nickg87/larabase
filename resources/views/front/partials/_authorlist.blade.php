<div class="card-box-d">
    <div class="card-img-d">
        <img src="{{$author->authorPic()}}" alt="" class="img-d img-fluid">
    </div>
    <div class="card-overlay card-overlay-hover">
        <div class="card-header-d">
            <div class="card-title-d align-self-center">
                <h3 class="title-d">
                    <a href="{{route('author',[$author->id,getFormatUri($author->name,'-')])}}" class="link-two">{{$author->name}}</a>
                </h3>
            </div>
        </div>
        <div class="card-body-d">
            <p class="content-d color-text-a">{{substr($author->description,0,100)}}
            </p>
            <div class="info-agents color-a">
                <p>
                    <strong>Phone: </strong> {{$author->phone}}</p>
                <p>
                    <strong>Email: </strong> {{$author->email}}</p>
            </div>
        </div>
        {{--<div class="card-footer-d">
            <div class="socials-footer d-flex justify-content-center">
                <ul class="list-inline">
                    <li class="list-inline-item">
                        <a href="#" class="link-one">
                            <i class="fa fa-facebook" aria-hidden="true"></i>
                        </a>
                    </li>
                    <li class="list-inline-item">
                        <a href="#" class="link-one">
                            <i class="fa fa-twitter" aria-hidden="true"></i>
                        </a>
                    </li>
                    <li class="list-inline-item">
                        <a href="#" class="link-one">
                            <i class="fa fa-instagram" aria-hidden="true"></i>
                        </a>
                    </li>
                    <li class="list-inline-item">
                        <a href="#" class="link-one">
                            <i class="fa fa-pinterest-p" aria-hidden="true"></i>
                        </a>
                    </li>
                    <li class="list-inline-item">
                        <a href="#" class="link-one">
                            <i class="fa fa-dribbble" aria-hidden="true"></i>
                        </a>
                    </li>
                </ul>
            </div>
        </div>--}}
    </div>
</div>