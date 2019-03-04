@extends('admin.main')
@section('title', 'All categories')
@section('stylesheets')
    <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
    <script src="https://raw.githack.com/SortableJS/Sortable/master/Sortable.js"></script>
    {!! Html::style('css/select2.min.css') !!}
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
                            Edit <strong>{{$page->title}}</strong>
                                <ul class="nav nav-pills pull-right">
                                    <li class="nav-item">
                                        <a class="nav-link  @if (\Route::current()->getName() == 'admin.page.edit')  active @endif " id="pills-home-tab" data-toggle="pill" href="{{route('admin.page.edit', $page->id)}}" role="tab" aria-controls="pills-home"
                                           aria-selected="true">Details</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link @if (\Route::current()->getName() == 'admin.page.gallery')  active @endif " id="pills-profile-tab" data-toggle="pill" href="{{route('admin.page.gallery', $page->id)}}" role="tab" aria-controls="pills-profile"
                                           aria-selected="false">Gallery</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link @if (\Route::current()->getName() == 'admin.page.files')  active @endif " id="pills-profile-tab" data-toggle="pill" href="{{route('admin.page.files', $page->id)}}" role="tab" aria-controls="pills-profile"
                                           aria-selected="false">Files</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link @if (\Route::current()->getName() == 'admin.page.comments')  active @endif " id="pills-profile-tab" data-toggle="pill" href="{{route('admin.page.comments', $page->id)}}" role="tab" aria-controls="pills-profile"
                                           aria-selected="false">Comments</a>
                                    </li>
                                </ul>
                        </div>




                        {!! Form::model($page, ['route'=>['admin.page.update',$page->id],'method'=>'PUT', 'files'=>true, 'class'=>'form-horizontal']) !!}

                            <div class="card-body card-block">
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    {{Form::label('title', 'Page title*', array('class'=>'form-control-label')) }}
                                    {!! $errors->first('title', '<small class="d-block alert alert-danger">:message</small>') !!}
                                </div>
                                <div class="col-12 col-md-9">
                                    {{Form::text('title', null, array('class'=>'form-control','required'=>'','maxlength'=>'255'))}}
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
                                    {{Form::label('is_static', 'Static', array('class'=>'form-control-label')) }}
                                </div>
                                <div class="col-12 col-md-1">
                                    {{Form::checkbox('is_static',null, $page->is_static, array('class'=>'form-control'))}}
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
                                    <label for="link" class=" form-control-label">Menu</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <select name="menu_id" class="form-control">
                                        <option value="0">--ROOT--</option>
                                        @foreach($menus as $menu)
                                            <option @if($page->menu_id==$menu->id) selected @endif value="{{$menu->id}}">{!! $menu->indexTree($menu->level) !!} {{$menu->link}}</option>
                                        @endforeach
                                    </select>
                                    <small class="form-text text-muted">*Optional for dinamic pages</small>
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
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    {{Form::label('tags', 'Page tags')}}
                                    {!! $errors->first('tags', '<small class="d-block alert alert-danger">:message</small>') !!}
                                </div>
                                <div class="col-12 col-md-9">
                                    {{Form::select('tags[]',$tags, null, ['class'=>'form-control select2-multi ','multiple'=>'multiple'])}}
                                </div>
                            </div>

                        </div>
                            <div class="card-footer">
                                <button @if(!Auth::user()->isUser()) type="submit" @else type="button"  onclick="return alert('You don\'t have acces to this feature'); return false;"  @endif class="btn btn-primary btn-sm">
                                    <i class="fa fa-dot-circle-o"></i> Update
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
    <script src="/backend/js/sortable.js"></script>
    {!! Html::script('js/select2.min.js') !!}
    <script type="text/javascript">
        $('.select2-multi').select2();
    </script>
@endsection