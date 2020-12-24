<div class="list-group ">
    @foreach($LEFTMENU as $item)
        @if(str_contains(Request::url(), $item->prefix))
            <a href="{{$item->url}}"
               class="
               list-group-item
               list-group-item-action
               {{ strcmp("/".Request::path(), $item->url ) == 0 ? 'active font-weight-bold' : '' }}">@lang($item->lang)
            </a>
        @endif
    @endforeach
</div>
