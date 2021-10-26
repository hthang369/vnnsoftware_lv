@extends('admin::layouts.master')

@section('content')
<div class="d-flex justify-content-between">
    <h4>@lang('admin::common.menu_struct')</h4>
    <x-button id="btn-save-menu">@lang('admin::common.btn_save')</x-button>
</div>
<div class="menu-struct">
{!! $data['grid'] !!}
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
            placeholder: 'menu-highlight',
            maxLevels: 3,
            opacity: .6,
        });

        $('#btn-save-menu').click(function() {
            let data = JSON.stringify($('ol.sortable').nestedSortable('toHierarchy'))
            $api.put('{{route("menus.update", $data["result"])}}', data);
        });
    });
</script>
@endpush
