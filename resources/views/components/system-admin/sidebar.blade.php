<div class="bg-light border-right" id="sidebar-wrapper">
    <div class="list-group list-group-flush">

    @foreach($LEFTMENU as $itemLeft)

        @if(substr(Route::currentRouteName(), 0, strpos(Route::currentRouteName(), '.')) == $itemLeft->group)
            @if(!in_array($itemLeft->route_name, $NOT_HAS_PERMISSION))
                <a href="{{$itemLeft->url}}"
                   class="
                        list-group-item list-group-item-action
                        {{ Route::currentRouteName() == $itemLeft->route_name ?
                        ' active font-weight-bold bg-info' : '' }}">
                    @lang($itemLeft->lang)
                </a>
            @endif
        @endif
    @endforeach
    </div>
</div>

