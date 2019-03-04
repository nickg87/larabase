@extends('admin.main')
@section('title', 'All categories')
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
                            Edit <strong>{{$banner->name}}</strong>
                        </div>
                        {!! Form::model($banner, ['route'=>['admin.banner.update',$banner->id],'method'=>'PUT', 'files'=>true, 'class'=>'form-horizontal']) !!}
                        <div class="card-body card-block">
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="title" class=" form-control-label">Title</label>
                                    {!! $errors->first('title', '<small class="d-block alert alert-danger">:message</small>') !!}
                                </div>
                                <div class="col-12 col-md-9">
                                    <input type="text" id="title" name="title" placeholder="Title " value="{{$banner->title}}" class="form-control">
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    {{Form::label('small', 'Small text', array('class'=>'form-control-label')) }}
                                    {!! $errors->first('small', '<small class="d-block alert alert-danger">:message</small>') !!}
                                </div>
                                <div class="col-12 col-md-9">
                                    {{Form::text('small', null, array('class'=>'form-control','maxlength'=>'255','placeholder'=>'Small text'))}}
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    {{Form::label('button', 'Button text', array('class'=>'form-control-label')) }}
                                    {!! $errors->first('button', '<small class="d-block alert alert-danger">:message</small>') !!}
                                </div>
                                <div class="col-12 col-md-9">
                                    {{Form::text('button', null, array('class'=>'form-control','maxlength'=>'255','placeholder'=>'Button text'))}}
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    {{Form::label('link', 'Link', array('class'=>'form-control-label')) }}
                                    {!! $errors->first('link', '<small class="d-block alert alert-danger">:message</small>') !!}
                                </div>
                                <div class="col-12 col-md-9">
                                    {{Form::text('link', null, array('class'=>'form-control','maxlength'=>'255','placeholder'=>'Link'))}}
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button @if(!Auth::user()->isUser()) type="submit" @else type="button"  onclick="return alert('You don\'t have acces to this feature'); return false;"  @endif class="btn btn-primary btn-sm">
                                <i class="fa fa-dot-circle-o"></i> Update
                            </button>
                            <a href="{{route('admin.category.index')}}" type="reset" class="btn btn-danger btn-sm">
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