@extends('admin::layouts.master')

@section('content')
<div class="d-flex justify-content-between">
    <h4>@lang('admin::menus.menu_struct')</h4>
    <x-button id="btn-save-menu" variant="primary" :data-loading="__('admin::common.loading')">@lang('admin::common.btn_save')</x-button>
</div>
<div class="menu-struct row">
    <div class="col-6">
        {!! $data['grid'] !!}
    </div>
</div>
@endsection

@push('scripts')
<script src="{{ asset('js/jquery-ui.min.js') }}"></script>
<script src="{{ asset('js/jquery.mjs.nestedSortable.js') }}"></script>
<script>
    $(document).ready(function() {
        $('ol.sortable').nestedSortable({
            forcePlaceholderSize: true,
            items: 'li',
            handle: 'span',
            placeholder: 'highlight',
            maxLevels: 3,
            opacity: .6,
        });

        $('#btn-save-menu').click(function() {
            let data = JSON.stringify($('ol.sortable').nestedSortable('toArray', {startDepthCount: 0}))
            $api.put('{{route("menus.sort-update", $data["result"])}}', data, {
                'targetLoading': '#btn-save-menu',
                'pjaxContainer': '.ui-sortable'
            });
        });
    });
</script>
@endpush
