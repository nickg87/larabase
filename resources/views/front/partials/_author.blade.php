<div class="col-md-12">
    <div class="row section-t3">
        <div class="col-sm-12">
            <div class="title-box-d">
                <h3 class="title-d">About author</h3>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-3 col-md-1 col-lg-2">
            <img src="{!! $author->avatar() !!}" alt="" class="img-fluid">
        </div>
        <div class="col-sm-9 col-md-11 col-lg-6">
            <div class="property-agent">
                <h4 class="title-agent">{{$author->name}}</h4>
                <p class="color-text-a">{{$author->description}}</p>
                <ul class="list-unstyled">
                    <li class="d-flex justify-content-between">
                        <strong>Phone:</strong>
                        <span class="color-text-a">{{$author->phone}}</span>
                    </li>
                    <li class="d-flex justify-content-between">
                        <strong>Email:</strong>
                        <span class="color-text-a">{{$author->email}}</span>
                    </li>
                </ul>
                <div class="socials-a">
                    <ul class="list-inline">
                        <li class="list-inline-item">
                            <a href="#">
                                <i class="fa fa-facebook" aria-hidden="true"></i>
                            </a>
                        </li>
                        <li class="list-inline-item">
                            <a href="#">
                                <i class="fa fa-twitter" aria-hidden="true"></i>
                            </a>
                        </li>
                        <li class="list-inline-item">
                            <a href="#">
                                <i class="fa fa-instagram" aria-hidden="true"></i>
                            </a>
                        </li>
                        <li class="list-inline-item">
                            <a href="#">
                                <i class="fa fa-pinterest-p" aria-hidden="true"></i>
                            </a>
                        </li>
                        <li class="list-inline-item">
                            <a href="#">
                                <i class="fa fa-dribbble" aria-hidden="true"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-md-12 col-lg-4">
            <div class="property-contact">
                {!! Form::open(['route'=>['author', $author->id,getFormatUri($author->name,'-')], 'method'=>'post', 'class'=>'form-a', 'id'=>'author-form']) !!}
                @if (Session::has('success'))
                    <div class="alert alert-success" role="alert">
                        <strong>Success:</strong> {{Session::get('success')}}
                    </div>
                @endif
                @if (count($errors)>0)

                    <div class="alert alert-danger" role="alert">
                        <strong>Errors:</strong>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{$error}}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                    <div class="row">
                        <div class="col-md-12 mb-1">
                            <div class="form-group">
                                {{Form::text('name', null, array('class'=>'form-control form-control-lg form-control-a','required'=>'','maxlength'=>'255','placeholder'=>'Name *'))}}
                            </div>
                        </div>
                        <div class="col-md-12 mb-1">
                            <div class="form-group">
                                {{Form::text('email', null, array('class'=>'form-control form-control-lg form-control-a','required'=>'','maxlength'=>'255','placeholder'=>'Email *'))}}
                            </div>
                        </div>
                        <div class="col-md-12 mb-1">
                            <div class="form-group">
                                {{Form::textarea('message',null,['class'=>'form-control','required'=>'','placeholder'=>'Your message *', 'rows'=>'4'])}}
                            </div>
                        </div>
                        <div class="col-md-12">
                            {{Form::submit('Send Message',['class'=>'btn btn-a g-recaptcha', 'data-badge'=>'bottomleft', 'data-callback'=>'onSubmit', 'data-sitekey'=>env('GOOGLE_RECAPTCHA_KEY')])}}
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@section('scripts')
    <script>
        function onSubmit(token) {
            document.getElementById("author-form").submit();
        }
    </script>
@endsection