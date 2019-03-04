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
                            Edit <strong>{{$catEdit->name}}</strong>
                        </div>
                        {!! Form::model($catEdit, ['route'=>['admin.category.update',$catEdit->id],'method'=>'PUT', 'files'=>true, 'class'=>'form-horizontal']) !!}
                            <div class="card-body card-block">
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="name" class=" form-control-label">Category name*</label>
                                        {!! $errors->first('name', '<small class="d-block alert alert-danger">:message</small>') !!}
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input type="text" id="name" name="name" placeholder="Category name" value="{{$catEdit->name}}" class="form-control">
                                        <small class="form-text text-muted">Ex: {{url('/')}}/<strong>category</strong>/article</small>
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
                                        <label for="description" class=" form-control-label">Category description</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <textarea name="description" id="description" rows="9" placeholder="Content..." class="form-control">{{$catEdit->description}}</textarea>
                                        <small class="form-text text-muted">This is optional. Improves SEO reading by search engine boots</small>
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