@extends('admin.main')
@section('title', 'Site settings')
@section('stylesheets')
    <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
    <script>
        tinymce.init({
            selector:'textarea.tinymce',
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
                    {!! Form::model($setting, ['route'=>['admin.setting.update',$setting->id],'method'=>'PATCH', 'files'=>true, 'class'=>'form-horizontal']) !!}
                    <div class="card">
                        <div class="card-header">
                            General site <strong>settings</strong>
                        </div>

                        <div class="card-body card-block">
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="name" class=" form-control-label">Name*</label>
                                    {!! $errors->first('name', '<small class="d-block alert alert-danger">:message</small>') !!}
                                </div>
                                <div class="col-12 col-md-9">
                                    {{Form::text('name', null, array('class'=>'form-control','minlength'=>'10','maxlength'=>'255'))}}
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    {{Form::label('title', 'Title*', array('class'=>'form-control-label')) }}
                                    {!! $errors->first('title', '<small class="d-block alert alert-danger">:message</small>') !!}
                                </div>
                                <div class="col-12 col-md-9">
                                    {{Form::text('title', null, array('class'=>'form-control','minlength'=>'10','maxlength'=>'255'))}}
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    {{Form::label('description', 'Description')}}
                                    {!! $errors->first('description', '<small class="d-block alert alert-danger">:message</small>') !!}
                                </div>
                                <div class="col-12 col-md-9">
                                    {{Form::textarea('description',null,['class'=>'form-control tinymce', 'rows'=>'4'])}}
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    {{Form::label('keywords', 'Keywords', array('class'=>'form-control-label')) }}
                                    {!! $errors->first('keywords', '<small class="d-block alert alert-danger">:message</small>') !!}
                                </div>
                                <div class="col-12 col-md-9">
                                    {{Form::text('keywords', null, array('class'=>'form-control','minlength'=>'10','maxlength'=>'255'))}}
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="card">
                        <div class="card-header">
                            Contact <strong>settings</strong>
                        </div>
                        <div class="card-body card-block">
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    {{Form::label('about', 'About')}}
                                </div>
                                <div class="col-12 col-md-9">
                                    {{Form::textarea('about',null,['class'=>'form-control tinymce', 'rows'=>'2'])}}
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="phone" class=" form-control-label">Phone</label>
                                    {!! $errors->first('phone', '<small class="d-block alert alert-danger">:message</small>') !!}
                                </div>
                                <div class="col-12 col-md-9">
                                    {{Form::text('phone', null, array('class'=>'form-control','minlength'=>'10','maxlength'=>'255'))}}
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="email" class=" form-control-label">Email</label>
                                    {!! $errors->first('email', '<small class="d-block alert alert-danger">:message</small>') !!}
                                </div>
                                <div class="col-12 col-md-9">
                                    {{Form::text('email', null, array('class'=>'form-control','minlength'=>'10','maxlength'=>'255'))}}
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    {{Form::label('google_maps', 'Google map code', array('class'=>'form-control-label')) }}
                                    {!! $errors->first('google_maps', '<small class="d-block alert alert-danger">:message</small>') !!}
                                </div>
                                <div class="col-12 col-md-9">
                                    {{Form::textarea('google_maps',null,['class'=>'form-control', 'rows'=>'4'])}}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            Miscellaneous <strong>settings</strong>
                        </div>
                        <div class="card-body card-block">
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    {{Form::label('head_scripts', 'Head scripts', array('class'=>'form-control-label')) }}
                                    {!! $errors->first('head_scripts', '<small class="d-block alert alert-danger">:message</small>') !!}
                                </div>
                                <div class="col-12 col-md-9">
                                    {{Form::textarea('head_scripts',null,['class'=>'form-control', 'rows'=>'4'])}}
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    {{Form::label('foot_scripts', 'Foot scripts', array('class'=>'form-control-label')) }}
                                    {!! $errors->first('foot_scripts', '<small class="d-block alert alert-danger">:message</small>') !!}
                                </div>
                                <div class="col-12 col-md-9">
                                    {{Form::textarea('foot_scripts',null,['class'=>'form-control', 'rows'=>'4'])}}
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button @if(Auth::user()->isAdmin()) type="submit" @else type="button"  onclick="return alert('You don\'t have acces to this feature'); return false;"  @endif class="btn btn-primary btn-sm">
                                <i class="fa fa-dot-circle-o"></i> Save
                            </button>
                            <a href="{{route('admin.')}}" type="reset" class="btn btn-danger btn-sm">
                                <i class="fa fa-ban"></i> Cancel
                            </a>
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
    <!-- END MAIN CONTENT-->



@stop

@section("scripts")
    <script src="/backend/js/anchor-form.js"></script>
@endsection