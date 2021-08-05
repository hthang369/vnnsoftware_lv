<div class="bg-light border-right" id="sidebar-wrapper">
    <div class="list-group list-group-flush">

    @foreach($LEFTMENU as $itemLeft)
        @php($activeClass = Route::currentRouteName() == $itemLeft->route_name ? 'active font-weight-bold bg-info' : '')
        {!! link_to_route($itemLeft->route_name, __($itemLeft->lang), [], [
            'class' => get_classes(['list-group-item', 'list-group-item-action', $activeClass])
        ]) !!}
    @endforeach
    </div>
</div>

