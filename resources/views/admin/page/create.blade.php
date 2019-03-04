@extends('admin.main')
@section('title', 'Add new page')
@section('stylesheets')
    <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
    <script>
        tinymce.init({
            selector:'textarea',
            branding: false,
            plugins: "link",
            menubar:false,
        });
    </script><script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
@endsection
@section('content')

    <!-- MAIN CONTENT-->
    <div class="main-content">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                @include('admin.partials._messages')
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            Add <strong>new page</strong>
                        </div>
                        {!! Form::open(['route' => 'admin.page.store','files'=>true, 'class'=>'form-horizontal' ]) !!}
                        <div class="card-body card-block">
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="title" class=" form-control-label">Page title*</label>
                                        {!! $errors->first('title', '<small class="d-block alert alert-danger">:message</small>') !!}
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input type="text" id="title" name="title" placeholder="Page title" class="form-control">
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        {{Form::label('slug', 'Slug*', array('class'=>'form-control-label')) }}
                                        {!! $errors->first('slug', '<small class="d-block alert alert-danger">:message</small>') !!}
                                    </div>
                                    <div class="col-12 col-md-9">
                                        {{Form::text('slug', null, array('class'=>'form-control','minlength'=>'5','maxlength'=>'255'))}}
                                        <small class="form-text text-muted">Ex: {{url('/')}}/<strong>slug</strong> </small>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="title" class=" form-control-label">Category*</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        {{Form::select('category_id',$categories, null, ['class'=>'form-control'])}}
                                        <small class="form-text text-muted">*Optional for static pages</small>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        {{Form::label('short', 'Short description')}}
                                    </div>
                                    <div class="col-12 col-md-9">
                                        {{Form::textarea('short',null,['class'=>'form-control', 'rows'=>'2'])}}
                                        <small class="form-text text-muted">This is optional. Improves SEO reading by search engine boots</small>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        {{Form::label('body', 'Page body*')}}
                                        {!! $errors->first('body', '<small class="d-block alert alert-danger">:message</small>') !!}
                                    </div>
                                    <div class="col-12 col-md-9">
                                        {{Form::textarea('body',null,['class'=>'form-control', 'rows'=>'4'])}}
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button @if(!Auth::user()->isUser()) type="submit" @else type="button"  onclick="return alert('You don\'t have acces to this feature'); return false;"  @endif class="btn btn-primary btn-sm">
                                    <i class="fa fa-dot-circle-o"></i> Save
                                </button>
                                <a href="{{route('admin.page.index')}}" type="reset" class="btn btn-danger btn-sm">
                                    <i class="fa fa-ban"></i> Cancel
                                </a>
                            </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END MAIN CONTENT-->



@stop

@section("scripts")
    <script src="/backend/js/anchor-form.js"></script>
@endsection