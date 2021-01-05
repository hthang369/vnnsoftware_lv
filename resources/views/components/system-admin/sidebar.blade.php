<div class="bg-light border-right" id="sidebar-wrapper">
    <div class="list-group list-group-flush">
        @foreach($LEFTMENU as $item)
            @if(substr(Route::currentRouteName(), 0, strpos(Route::currentRouteName(), '.')) == $item->prefix)
                <a href="{{$item->url}}"
                   class="list-group-item list-group-item-action
               {{ Route::currentRouteName() == $item->route_name ? 'active font-weight-bold bg-info' : '' }}">@lang($item->lang)
                </a>
            @endif
        @endforeach
    </div>
</div>
