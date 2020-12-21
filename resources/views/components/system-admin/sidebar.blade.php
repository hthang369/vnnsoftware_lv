<div class="list-group ">
    @foreach($LEFTMENU as $item)
        @if(str_contains(Request::url(), $item->prefix))
            <a href="{{$item->url}}" class="list-group-item list-group-item-action">@lang($item->lang)</a>
        @endif
    @endforeach
</div>
