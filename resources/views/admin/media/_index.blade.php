@extends('admin.main')
@section('title', 'All media')
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
                                <h3 class="title-5 m-b-35">Media</h3>
                            </div>
                        </div>
                        {{--
                        <div class="table-responsive table--no-card m-b-30">
                            <table class="table table-borderless table-striped table-earning">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Title</th>
                                    <th>Short Description</th>
                                    <th>date added</th>
                                    <th class="text-right">date modified</th>
                                    <th class="text-right">activ</th>
                                    <th class="text-right"></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($pages as $page)
                                    <tr>
                                        <td>{{$page->id}}</td>
                                        <td>{{$page->title}}</td>
                                        <td>{!! $page->short !!}</td>
                                        <td>{{$page->created_at}}</td>
                                        <td class="text-right">{{$page->updated_at}}</td>
                                        <td class="text-right">&nbsp;</td>
                                        <td class="text-right">
                                            <div class="table-data-feature">
                                                <a href="{{route('admin.page.edit', $page->id)}}" class="item" data-toggle="tooltip" data-placement="top" title="Edit this category">
                                                    <i class="zmdi zmdi-edit"></i>
                                                </a>
                                                <a href="{{route('admin.page.destroy',$page->id)}}" class="item" data-toggle="tooltip" data-placement="top" data-method="delete" data-token="{{csrf_token()}}" onclick="return confirm('Do you really want to delete this page?')"  title="Delete this page">
                                                    <i class="zmdi zmdi-delete"></i>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END MAIN CONTENT-->

@stop

@section("scripts")

    <script src="/backend/js/anchor-form.js"></script>
    <script src="/backend/js/dropzone.js"></script>
    <script src="/backend/js/dropzone-config.js"></script>
@endsection