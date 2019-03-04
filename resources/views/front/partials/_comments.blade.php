<div class="col-md-12 ">
    <div class="title-box-d">
        <h3 class="title-d" id="comments">Comments ({{$page->approved_comments->count()}})</h3>
    </div>
    @if ($page->approved_comments->count())
    <div class="box-comments" >
        <ul class="list-comments">
            @foreach ($page->approved_comments as $comment)
            <li>
                <div class="comment-avatar">
                    <img src="{{"https://www.gravatar.com/avatar/". md5(strtolower(trim($comment->email))).'?s=50&d=mm' }}" alt="" class="author-image">
                </div>
                <div class="comment-details">
                    <h4 class="comment-author">{{$comment->name}}</h4>
                    <span>{{ getFromDateAttribute($comment->created_at) }}</span>
                    <p class="comment-description">
                        {{$comment->comment}}
                    </p>
                    {{--<a href="3">Reply</a>--}}
                </div>
            </li>
            @endforeach
            {{--<li class="comment-children">
                <div class="comment-avatar">
                    <img src="/frontend/img/author-1.jpg" alt="">
                </div>
                <div class="comment-details">
                    <h4 class="comment-author">Oliver Colmenares</h4>
                    <span>18 Sep 2017</span>
                    <p class="comment-description">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolores reprehenderit, provident cumque
                        ipsam temporibus maiores
                        quae.
                    </p>
                    <a href="3">Reply</a>
                </div>
            </li>--}}
        </ul>
    </div>
    @endif



    <div class="form-comments">
        <div class="title-box-d">
            <h3 class="title-d"> Leave a comment</h3>
        </div>
        {!! Form::open(['route'=>['comment.store', $page->id], 'method'=>'post', 'class'=>'form-a', 'id'=>'comment-form']) !!}
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
                <div class="col-md-6 mb-3">
                    <div class="form-group">
                        {{Form::label('name', 'Enter name:') }}
                        {{Form::text('name', null, array('class'=>'form-control form-control-lg form-control-a','required'=>'','maxlength'=>'255','placeholder'=>'Name *'))}}
                    </div>
                </div>
                <div class="col-md-6 mb-3">
                    <div class="form-group">
                        {{Form::label('email', 'Enter email:') }}
                        {{Form::text('email', null, array('class'=>'form-control form-control-lg form-control-a','required'=>'','maxlength'=>'255','placeholder'=>'Email *'))}}
                    </div>
                </div>

                <div class="col-md-12 mb-3">
                    <div class="form-group">
                        {{Form::label('comment', 'Enter message:') }}
                        {{Form::textarea('comment',null,['class'=>'form-control','required'=>'','placeholder'=>'Your comment *', 'rows'=>'4'])}}
                    </div>
                </div>
                <div class="col-md-12">
                    {{Form::submit('Send Message',['class'=>'btn btn-a g-recaptcha', 'data-badge'=>'bottomleft', 'data-callback'=>'onSubmit', 'data-sitekey'=>env('GOOGLE_RECAPTCHA_KEY')])}}
                </div>
            </div>
        </form>
    </div>
</div>

@section('scripts')
    <script>
        function onSubmit(token) {
            document.getElementById("comment-form").submit();
        }
    </script>
@endsection