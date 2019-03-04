@extends('admin.main')
@section('title', 'All tags')
@section('content')

    <!-- MAIN CONTENT-->
    <div class="main-content">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                @include('admin.partials._messages')
                <div class="row">
                    <div class="col-md-12">

                        <div class="table-data__tool">
                            <div class="table-data__tool-left">
                                <h3 class="title-5 m-b-35">Tags</h3>
                            </div>
                            <div class="table-data__tool-right">
                                <a href="{{route('admin.tag.create')}}" class="au-btn au-btn-icon au-btn--green au-btn--small">
                                    <i class="zmdi zmdi-plus"></i>Add tag</a>

                            </div>
                        </div>


                        <div class="table-responsive table--no-card m-b-30">
                            <table class="table table-borderless table-striped table-earning">
                                <thead>
                                <tr>

                                    <th>ID</th>
                                    <th>Tag</th>
                                    <th>date added</th>
                                    <th class="text-right">date modified</th>
                                    <th class="text-right"></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($tags as $tag)
                                    <tr>
                                        <td>{{$tag->id}}</td>
                                        <td><div class="flex-fill" style="float: left; width:100px; overflow: hidden;">{!! $tag->name !!}</div></td>
                                        <td>{{$tag->created_at}}</td>
                                        <td class="text-right">{{$tag->updated_at}}</td>
                                        <td class="text-right">
                                            <div class="table-data-feature">
                                                <a href="{{route('admin.tag.edit', $tag->id)}}" class="item" data-toggle="tooltip" data-placement="top" title="Edit this category">
                                                    <i class="zmdi zmdi-edit"></i>
                                                </a>
                                                <a @if (!Auth::user()->isUser())  href="{{route('admin.tag.destroy',$tag->id)}}" data-method="delete" data-confirm="Do you really want to delete this item?" data-token="{{csrf_token()}}" @else href="#" onclick="return alert('You don\'t have acces to this feature')"  @endif class="item" data-toggle="tooltip" data-placement="top"   title="Delete this entry">
                                                    <i class="zmdi zmdi-delete"></i>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END MAIN CONTENT-->

@stop

@section("scripts")
    <script src="/backend/js/app.js"></script>
    <script src="/backend/js/anchor-form.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            laravel.initialize();
        })
    </script>
@endsection