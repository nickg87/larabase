@extends('admin.main')
@section('title', 'All categories')
@section('content')

    <!-- MAIN CONTENT-->
    <div class="main-content">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                @include('admin.partials._messages')
                <div class="row">
                    <div class="col-lg-12">
                        <!-- USER DATA-->
                        <div class="user-data m-b-30">
                            <h3 class="title-3 m-b-30 pull-left">
                                <i class="zmdi zmdi-account-calendar"></i>Defined users</h3>
                            <div class="filters m-b-45 pull-right">
                                <a @if(Auth::user()->isAdmin()) href="{{route('admin.user.create')}}" @else href="#" onclick="return alert('You don\'t have acces to this feature')"  @endif class="au-btn au-btn-icon au-btn--green au-btn--small">
                                    <i class="zmdi zmdi-plus"></i>Add user</a>
                            </div>
                            <div class="table-responsive table-data">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        {{--<td>
                                            <label class="au-checkbox">
                                                <input type="checkbox">
                                                <span class="au-checkmark"></span>
                                            </label>
                                        </td>--}}
                                        <td>&nbsp;</td>
                                        <td>name</td>
                                        <td>role</td>
                                        <td>type</td>
                                        <td>Dates</td>
                                        <td>Edit</td>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($users as $user)
                                    <tr>
                                        {{--<td>
                                            <label class="au-checkbox">
                                                <input type="checkbox">
                                                <span class="au-checkmark"></span>
                                            </label>
                                        </td>--}}
                                        <td>
                                            <div class="avatar-wrap @if(Auth::check()) @if(Auth::getUser()->id==$user->id) online @endif @endif">
                                                <div class="avatar">
                                                    <img src="{!! $user->avatar() !!} " alt="{{$user->name}}">
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="table-data__info">
                                                <h6>{{$user->name}}</h6>
                                                <span><a href="#">{{$user->email}}</a></span>
                                                <br>
                                                <span><i><a>@if(!empty($user->last_login)) {{ \Carbon\Carbon::parse($user->last_login)->diffForHumans() }} @endif</a></i></span>
                                            </div>
                                        </td>
                                        <td>
                                            <span class="role @switch($user->isAdmin) @case(1) member @break @case(2) user @break @default admin @endswitch">
                                                @switch($user->isAdmin) @case(1) member @break @case(2) user @break @default admin @endswitch
                                            </span>
                                        </td>
                                        <td>
                                            <div class="rs-select2--trans rs-select2--sm">
                                                {!! Form::model($user, ['route'=>['admin.user.updateRole',$user->id],'method'=>'PATCH', 'files'=>true, 'class'=>'form-horizontal']) !!}
                                                <select class="js-select2" name="isAdmin" @if(Auth::user()->isAdmin() && Auth::user()->id<>$user->id) onchange="this.form.submit()"  @else disabled @endif >
                                                    <option @if ($user->isAdmin==0)selected="selected" @endif value="0">Full Control</option>
                                                    <option @if ($user->isAdmin==1)selected="selected" @endif value="1">Post</option>
                                                    <option @if ($user->isAdmin==2)selected="selected" @endif value="2">Watch</option>
                                                </select>
                                                <div class="dropDownSelect2"></div>
                                                {{Form::text('id', null, array('class'=>'form-control', 'hidden', 'minlength'=>'10','maxlength'=>'255'))}}
                                                {!! Form::close() !!}
                                            </div>
                                        </td>
                                        <td>
                                            <div class="table-data__info">
                                                <span><a href="#">created at: {{ \Carbon\Carbon::parse($user->created_at)->toFormattedDateString() }}</a></span>
                                                <br>
                                                <span><a href="#">modified at: {{ \Carbon\Carbon::parse($user->updated_at)->toFormattedDateString() }}</a></span>
                                            </div>
                                        </td>
                                        <td>
                                            <a @if(Auth::user()->isAdmin()) href="{{route('admin.user.edit',$user->id)}}" @else  href="#" onclick="return alert('You don\'t have acces to this feature')"  @endif class="chosen-single more" data-toggle="tooltip" data-placement="top" title="Edit this user">
                                                <i class="zmdi zmdi-more"></i>
                                            </a>
                                            <a @if(Auth::user()->isAdmin()) href="{{route('admin.user.destroy',$user->id)}}" data-toggle="tooltip" data-placement="top" data-method="delete" data-token="{{csrf_token()}}" data-confirm="Do you really want to delete this user?"  @else href="#" onclick="return alert('You don\'t have acces to this feature')"  @endif  class="chosen-single more" title="Delete this user">
                                                <i class="zmdi zmdi-delete"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="user-data__footer">
                                ..
                            </div>
                        </div>
                        <!-- END USER DATA-->
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- END MAIN CONTENT-->

@stop

@section("scripts")
    <script src="/backend/js/anchor-form.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            laravel.initialize();
        })
    </script>
@endsection