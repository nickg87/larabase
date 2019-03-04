@extends('admin.main')
@section('title', 'Edit user')
@section('content')

    <!-- MAIN CONTENT-->
    <div class="main-content">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                @include('admin.partials._messages')
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            Edit details for <strong>{{$user->name}}</strong>
                        </div>
                        @if($errors->any())
                            <h4>{{$errors->first()}}</h4>
                        @endif

                        <form action="{{route('admin.user.updateDetails',$user->id)}}" method="POST" enctype="multipart/form-data" class="form-horizontal">
                            @csrf
                            <input name="_method" type="hidden" value="PUT">
                            <div class="card-body card-block">
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="name" class=" form-control-label">Name*</label>
                                        {!! $errors->first('name', '<small class="d-block alert alert-danger">:message</small>') !!}
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input type="text" id="name" name="name" placeholder="User name" value="{{$user->name}}" class="form-control">
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="name" class=" form-control-label">Phone</label>
                                        {!! $errors->first('phone', '<small class="d-block alert alert-danger">:message</small>') !!}
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input type="text" id="phone" name="phone" placeholder="Phone number" value="{{$user->phone}}" class="form-control">
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="name" class=" form-control-label">Description</label>
                                        {!! $errors->first('description', '<small class="d-block alert alert-danger">:message</small>') !!}
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <textarea id="description" name="description" rows="4" placeholder="Description" class="form-control">{{$user->description}}</textarea>
                                    </div>
                                </div>



                            </div>
                            <div class="card-footer">
                                <button @if(Auth::user()->isAdmin()) type="submit" @else type="button"  onclick="return alert('You don\'t have acces to this feature'); return false;"  @endif class="btn btn-primary btn-sm">
                                    <i class="fa fa-dot-circle-o"></i> Update
                                </button>
                                <a href="{{route('admin.user.index')}}" type="reset" class="btn btn-danger btn-sm">
                                    <i class="fa fa-ban"></i> Cancel
                                </a>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            Edit settings for <strong>{{$user->name}}</strong>
                        </div>
                        @if($errors->any())
                            <h4>{{$errors->first()}}</h4>
                        @endif

                        <form action="{{route('admin.user.update',$user->id)}}" method="POST" enctype="multipart/form-data" class="form-horizontal">
                            @csrf
                            <input name="_method" type="hidden" value="PUT">
                            <div class="card-body card-block">
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="name" class=" form-control-label">Email*</label>
                                        {!! $errors->first('email', '<small class="d-block alert alert-danger">:message</small>') !!}
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input type="email" id="email" name="email" placeholder="Email" value="{{$user->email}}" class="form-control">
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="name" class=" form-control-label">Password*</label>
                                        {!! $errors->first('password', '<small class="d-block alert alert-danger">:message</small>') !!}
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input type="password" id="password" name="password" placeholder="Password" class="form-control">
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="name" class=" form-control-label">Confirm Password*</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Confirm password">
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="name" class=" form-control-label">Image as avatar</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        {{Form::file('avatar')}}
                                    </div>
                                </div>

                            </div>
                            <div class="card-footer">
                                <button @if(Auth::user()->isAdmin()) type="submit" @else type="button"  onclick="return alert('You don\'t have acces to this feature'); return false;"  @endif class="btn btn-primary btn-sm">
                                    <i class="fa fa-dot-circle-o"></i> Update
                                </button>
                                <a href="{{route('admin.user.index')}}" type="reset" class="btn btn-danger btn-sm">
                                    <i class="fa fa-ban"></i> Cancel
                                </a>
                            </div>
                        </form>
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