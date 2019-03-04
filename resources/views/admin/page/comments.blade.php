@extends('admin.main')
@section('title', 'All comments')
@section('stylesheets')
    <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
    <!-- jQuery UI -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>

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
                            Manage comments for <strong>{{$page->title}}</strong>
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
                        <div class="card-body">
                            <div class="table-responsive table--no-card m-b-30">
                                <table class="table table-borderless table-striped table-earning">
                                    <thead>
                                    <tr>

                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Comment</th>
                                        <th>date added</th>
                                        <th class="text-right">date modified</th>
                                        <th class="text-right"></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($page->comments as $comment)
                                        <tr>
                                            <td>{{$comment->id}}</td>
                                            <td>{{$comment->name}}<br>{{$comment->email}}</td>
                                            <td>{{$comment->comment }}</td>
                                            <td>{{$comment->created_at}}</td>
                                            <td class="text-right">{{$comment->updated_at}}</td>
                                            <td class="text-right">
                                                <div class="table-data-feature">
                                                    <a href="#" class="item" data-toggle="tooltip" data-placement="top" title="Approve this comment">
                                                        <i class="zmdi zmdi-assignment-check"></i>
                                                    </a>
                                                    <a href="#" class="item" data-toggle="tooltip" data-placement="top" title="Delete this comment">
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

                        <div class="card-footer">

                        </div>

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