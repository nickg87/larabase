@extends('admin.main')
@section('title', 'Add testimonial')
@section('stylesheets')
    {!! Html::style('css/parsley.css') !!}
    {!! Html::style('css/select2.min.css') !!}
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
                            Add <strong>new testimonial</strong>
                        </div>
                        {!! Form::open(['route' => 'admin.tag.store','files'=>true, 'class'=>'form-horizontal' ]) !!}
                        <div class="card-body card-block">
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="name" class=" form-control-label">Tag name*</label>
                                        {!! $errors->first('name', '<small class="d-block alert alert-danger">:message</small>') !!}
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input type="text" id="name" name="name" placeholder="Tag name" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button @if(!Auth::user()->isUser()) type="submit" @else type="button"  onclick="return alert('You don\'t have acces to this feature'); return false;"  @endif class="btn btn-primary btn-sm">
                                    <i class="fa fa-dot-circle-o"></i> Save
                                </button>
                                <a href="{{route('admin.testimonial.index')}}" type="reset" class="btn btn-danger btn-sm">
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