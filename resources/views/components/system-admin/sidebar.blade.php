<div class="bg-light border-right" id="sidebar-wrapper">
    <div class="list-group list-group-flush">

    @foreach($LEFTMENU as $itemLeft)
        <x-link class="list-group-item list-group-item-action {{ Route::currentRouteName() == $itemLeft->route_name ? ' active font-weight-bold bg-info' : ''}}"
            :href="route($itemLeft->route_name)"
            > @lang($itemLeft->lang)</x-link>
    @endforeach
    </div>
</div>

