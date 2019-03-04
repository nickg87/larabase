@extends('admin.main')
@section('title', 'All pages')
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
                                <h3 class="title-5 m-b-35">Pages</h3>
                            </div>
                            <div class="table-data__tool-right">
                                <a href="{{route('admin.page.create')}}" class="au-btn au-btn-icon au-btn--green au-btn--small">
                                    <i class="zmdi zmdi-plus"></i>Add page</a>

                            </div>
                        </div>
                        <div class="table-responsive table--no-card m-b-30">
                            <table class="table table-borderless table-striped table-earning">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>img</th>
                                    <th>Title</th>
                                    <th>Short Description</th>
                                    <th>date added</th>
                                    <th class="text-right">date modified</th>
                                    <th class="text-right"></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($pages as $page)
                                    <tr>
                                        <td>{{$page->id}}</td>
                                        <td>@if ($page->images->count()>0) <img class="img-responsive" width="40" src="/images/thumb/{{$page->images->first()->image}} "> @endif</td>
                                        <td>
                                            <a href="{{route('admin.page.edit', $page->id)}}"> {{$page->title}}@if($page->isStatic()) [static]@endif</a>
                                            @if ($page->author) <br><small>by {{$page->author->name}}</small> @endif

                                        </td>
                                        <td style="word-wrap: break-word">{{substr(strip_tags(nl2br($page->short)),0,30)}}</td>
                                        <td>{{$page->created_at}}</td>
                                        <td class="text-right">{{$page->updated_at}}</td>
                                        <td class="text-right" >
                                            <div class="table-data-feature pull-right">
                                                <a href="{{route('admin.page.edit', $page->id)}}" class="item" data-toggle="tooltip" data-placement="top" title="Edit this page">
                                                    <i class="zmdi zmdi-edit"></i>
                                                </a>
                                                <a href="{{route('admin.page.gallery', $page->id)}}" class="item" data-toggle="tooltip" data-placement="top" title="Edit this page's gallery">
                                                    <i class="fas fa-image"></i>
                                                </a>
                                                <a href="{{route('admin.page.files', $page->id)}}" class="item" data-toggle="tooltip" data-placement="top" title="Edit this page's files">
                                                    <i class="fas fa-file"></i>
                                                </a>
                                                <a href="{{route('admin.page.comments', $page->id)}}" class="item" data-toggle="tooltip" data-placement="top" title="Manage this page's comments">
                                                    <i class="zmdi zmdi-comments"></i>
                                                </a>
                                                <a @if (Auth::user()->isUser()) href="#" onclick="return alert('You don\'t have acces to this feature')"  @else href="{{route('admin.page.destroy',$page->id)}}"  data-token="{{csrf_token()}}" data-confirm="Do you really want to delete this page?" data-method="delete" @endif class="item" data-toggle="tooltip" data-placement="top"  title="Delete this page">
                                                    <i class="zmdi zmdi-delete"></i>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="text-center">
                                {!! $pages->links(); !!}
                                {{--{{ $pages->links('vendor.pagination.default') }}--}}
                            </div>
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
    <script type="text/javascript">
        $(document).ready(function () {
            laravel.initialize();
        })
    </script>
@endsection