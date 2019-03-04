@extends('admin.main')
@section('title', 'All banners')
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
                            <h3 class="title-3 m-b-30">
                                <i class="zmdi zmdi-collection-image"></i>Banners</h3>
                            <div class="row">
                                <div class="col-sm-10 offset-sm-1">
                                    <h4 class="page-heading">Upload your Images <span id="counter"></span></h4>
                                    {!! Form::open(['route' => 'admin.banner.store','files'=>true, 'class'=>'dropzone form-horizontal','id'=>'my-dropzone' ]) !!}
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



                            <div id="tag_container">
                                @include('admin.media.banner.presult')
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    &nbsp
                                </div>
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
    <script src="/backend/js/dropzone.js"></script>
    <script src="/backend/js/dropzone-banner-config.js"></script>
@endsection