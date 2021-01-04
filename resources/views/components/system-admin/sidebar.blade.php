<div class="list-group ">
    @foreach($LEFTMENU as $item)
        @if(substr(Route::currentRouteName(), 0, strpos(Route::currentRouteName(), '.')) == $item->prefix)
            <a href="{{$item->url}}"
               class="
               list-group-item
               list-group-item-action
               {{ Route::currentRouteName() == $item->route_name ? 'active font-weight-bold' : '' }}">@lang($item->lang)
            </a>
        @endif
    @endforeach
</div>
