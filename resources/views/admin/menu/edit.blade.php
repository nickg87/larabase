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
                            Edit <strong>{{$menuEdit->name}}</strong>
                        </div>
                        {!! Form::model($menuEdit, ['route'=>['admin.menu.update',$menuEdit->id],'method'=>'PUT', 'files'=>true, 'class'=>'form-horizontal']) !!}
                            <div class="card-body card-block">
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="link" class=" form-control-label">Menu link*</label>
                                        {!! $errors->first('link', '<small class="d-block alert alert-danger">:message</small>') !!}
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input type="text" id="link" name="link" placeholder="Category name" value="{{$menuEdit->link}}" class="form-control">
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="link" class=" form-control-label">Zone</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        {{Form::select('zone_id',$zones, null, ['class'=>'form-control'])}}
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="link" class=" form-control-label">Subcategory</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <select name="parent_id" class="form-control">
                                            <option value="0">--ROOT--</option>
                                            @foreach($menus as $menu)
                                                <option @if($menuEdit->parent_id==$menu->id) selected @endif value="{{$menu->id}}">{!! $menu->indexTree($menu->level) !!} {{$menu->link}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        {{Form::label('title', 'Title*', array('class'=>'form-control-label')) }}
                                        {!! $errors->first('title', '<small class="d-block alert alert-danger">:message</small>') !!}
                                    </div>
                                    <div class="col-12 col-md-9">
                                        {{Form::text('title', null, array('class'=>'form-control','minlength'=>'5','maxlength'=>'255'))}}
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        {{Form::label('slug', 'Slug*', array('class'=>'form-control-label')) }}
                                        {!! $errors->first('slug', '<small class="d-block alert alert-danger">:message</small>') !!}
                                    </div>
                                    <div class="col-12 col-md-9">
                                        {{Form::text('slug', null, array('class'=>'form-control','minlength'=>'5','maxlength'=>'255'))}}
                                    </div>
                                </div>


                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="description" class=" form-control-label">Menu description</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <textarea name="description" id="description" rows="9" placeholder="Content..." class="form-control">{{$menuEdit->description}}</textarea>
                                        <small class="form-text text-muted">This is optional. Improves SEO reading by search engine boots</small>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button @if(!Auth::user()->isUser()) type="submit" @else type="button"  onclick="return alert('You don\'t have acces to this feature'); return false;"  @endif class="btn btn-primary btn-sm">
                                    <i class="fa fa-dot-circle-o"></i> Update
                                </button>
                                <a href="{{route('admin.menu.index')}}" type="reset" class="btn btn-danger btn-sm">
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