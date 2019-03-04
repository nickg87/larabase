<div class="row">
    <div class="col-lg-6 offset-lg-3 py-5 d-flex">
        {{ $images->links('vendor.pagination.ajax') }}
    </div>
</div>


<div class="table-responsive table-data" style="height:auto">
    <table class="table">
        <thead>
        <tr>
            <td>Image</td>
            <td>File name</td>
            <td>Added on</td>
            <td>Pages assigned</td>
            <td></td>
        </tr>
        </thead>
        <tbody>
        @foreach($images as $image)
            <tr>
                <td>
                    <img src="/images/thumb/{!! $image->image  !!} ">
                </td>
                <td>
                    <div class="table-data__info">
                        <h6 style="text-transform:none">{!! $image->image  !!}</h6>
                        <span> <a target="_blank" href="{{asset('images/original/'.$image->image)}}#">see original image</a> | <a target="_blank" href="{{asset('images/resized/'.$image->image)}}#">see resized image</a></span>
                    </div>
                </td>
                <td class="text-right" >
                    <div class="table-data__info">
                        {{ $image->created_at }}
                    </div>
                </td>
                <td>
                    <div class="table-data__info">
                    @foreach ($image->pages as $page)
                        <span > <a>{{$page->title}} </a></span> <br>
                    @endforeach
                    </div>
                </td>
                <td>
                    <div class="table-data-feature">
                        <a @if (!Auth::user()->isUser())  href="{{route('admin.image.destroy',$image->id)}}" data-method="delete" data-token="{{csrf_token()}}" data-confirm="Do you really want to delete ?" @else href="#" onclick="return alert('You don\'t have acces to this feature')" @endif class=" item" data-toggle="tooltip" data-placement="top"  title="Delete this image">
                            <i class="zmdi zmdi-delete"></i>
                        </a>
                    </div>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>

<div class="row">
    <div class="col-lg-6 offset-lg-3 py-5 d-flex">
        {{ $images->links('vendor.pagination.ajax') }}
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function () {
        laravel.initialize();
    })
</script>