@extends('admin.main')
@section('title', 'All categories')
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
                                <h3 class="title-5 m-b-35">Testimonials</h3>
                            </div>
                            <div class="table-data__tool-right">
                                <a href="{{route('admin.testimonial.create')}}" class="au-btn au-btn-icon au-btn--green au-btn--small">
                                    <i class="zmdi zmdi-plus"></i>Add testimonial</a>

                            </div>
                        </div>


                        <div class="table-responsive table--no-card m-b-30">
                            <table class="table table-borderless table-striped table-earning">
                                <thead>
                                <tr>

                                    <th>ID</th>
                                    <th>Image</th>
                                    <th>From</th>
                                    <th>Text</th>
                                    <th>date added</th>
                                    <th class="text-right">date modified</th>
                                    <th class="text-right"></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($testimonials as $testimonial)
                                    <tr>
                                        <td>{{$testimonial->id}}</td>
                                        <td>
                                            @if ($testimonial->image) <img class="img-responsive" width="40" src="/images/testimonials/{{$testimonial->image}} "> @endif
                                        </td>
                                        <td>{{$testimonial->from}}</td>
                                        <td><div class="flex-fill" style="float: left; width:100px; overflow: hidden;">{!! $testimonial->text !!}</div></td>
                                        <td>{{$testimonial->created_at}}</td>
                                        <td class="text-right">{{$testimonial->updated_at}}</td>
                                        <td class="text-right">
                                            <div class="table-data-feature">
                                                <a href="{{route('admin.category.edit', $testimonial->id)}}" class="item" data-toggle="tooltip" data-placement="top" title="Edit this category">
                                                    <i class="zmdi zmdi-edit"></i>
                                                </a>
                                                <a @if (!Auth::user()->isUser())  href="{{route('admin.testimonial.destroy',$testimonial->id)}}" data-method="delete" data-confirm="Do you really want to delete this item?" data-token="{{csrf_token()}}" @else href="#" onclick="return alert('You don\'t have acces to this feature')"  @endif class="item" data-toggle="tooltip" data-placement="top"   title="Delete this entry">
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