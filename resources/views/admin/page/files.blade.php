@extends('admin.main')
@section('title', 'All categories')
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
                            </ul>
                        </div>
                        <div class="card-body">
                            <h4 class="card-title mb-3">Upload new file</h4>
                            <div class="row">
                                <div class="col-sm-10 offset-sm-1">
                                    {!! Form::open(['route' => 'admin.file.store','files'=>true, 'class'=>'dropzone form-horizontal','id'=>'my-dropzone' ]) !!}
                                    <input type="hidden" name="page_id" value="{!! $page->id !!}">
                                    <div class="dz-message">
                                        <div class="col-xs-8">
                                            <div class="message">
                                                <p>Drop files here or Click to Upload</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="fallback">
                                        <input type="file" name="file" multiple>
                                    </div>
                                    {!! Form::close() !!}
                                </div>
                            </div>
                        </div>

                        <div class="card-body">
                            <h4 class="card-title mb-3">Pick from Donload section</h4>
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="card">
                                            <div class="card-header">
                                                <strong class="card-title">Files in Download
                                                    <small>
                                                        <span class="badge badge-primary float-right mt-1">{!! count($downloads) !!}</span>
                                                    </small>
                                                </strong>
                                            </div>
                                            <div class="card-body" style="min-height: 100px">
                                                <ul id="allDownload" class="list-group col connectedSortable" >
                                                    @foreach ($downloads as $download)
                                                        <li class="list-group-item tinted allDownload" data-toggle="tooltip" data-placement="top" id="{!! $page->id !!}-{{ $download->id }}" title="{!! $download->original_name  !!}">&nbsp;{!! $download->file  !!}</li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="card">
                                            <div class="card-header">
                                                <strong class="card-title">Files assigned to page
                                                    <small>
                                                        <span id="counter" class="badge badge-success float-right mt-1">{!! count($page->files) !!}</span>
                                                    </small>
                                                </strong>
                                            </div>
                                            <div class="card-body" style="min-height: 100px">
                                                <ul id="selectedFiles" class="list-group col connectedSortable" style="min-height: 40px;">
                                                    @foreach ($page->files as $file)
                                                        <li class="list-group-item tinted" id="{!! $page->id !!}-{{ $file->id }}">&nbsp;{!! $file->original_name  !!} <a class="deleteFile pull-right" href="#"><i class="zmdi zmdi-delete"></i></a></li>
                                                    @endforeach
                                                </ul>
                                            </div>

                                        </div>
                                    </div>
                                </div>
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
    <script src="/backend/js/dropzone.js"></script>
    <script src="/backend/js/dropzone-file-config.js"></script>
    <script src="/backend/js/sortable.js"></script>


@endsection