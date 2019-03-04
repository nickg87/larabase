@foreach ($menus as $menu)
    <tr>
        <td>{{$menu->id}}</td>
        <td>
            @for ($i=0; $i<$menu->getDepth($menu); $i++) &nbsp;&nbsp; @endfor {{$menu->link}}

        </td>
        <td>{!! $menu->description !!} </td>
        <td>{{$menu->created_at}}</td>
        <td class="text-right">{{$menu->updated_at}}</td>
        <td class="text-right">
            <div class="table-data-feature">
                <a href="{{route('admin.menu.edit', $menu->id)}}" class="item" data-toggle="tooltip"
                   data-placement="top" title="Edit this category">
                    <i class="zmdi zmdi-edit"></i>
                </a>
                <a @if (!Auth::user()->isUser())  href="{{route('admin.menu.destroy',$menu->id)}}" data-method="delete"
                   data-confirm="Do you really want to delete this category?" data-token="{{csrf_token()}}"
                   @else href="#" onclick="return alert('You don\'t have acces to this feature')" @endif class="item"
                   data-toggle="tooltip" data-placement="top" title="Delete this category">
                    <i class="zmdi zmdi-delete"></i>
                </a>

            </div>
        </td>
    </tr>
    @if($menu->children)
        @include('admin.menu._rows', ['menus' => $menu->children])
    @endif
@endforeach