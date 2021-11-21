@extends('admin::layouts.master')

@section('content')
<div class="d-flex justify-content-between">
    <h4>@lang('admin::menus.menu_struct')</h4>
    <x-button id="btn-save-menu" variant="primary" :data-loading="__('admin::common.loading')">@lang('admin::common.btn_save')</x-button>
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
            let btnHtml = $(this).html();
            let loadingText = $(this).data('loading');
            $api.put('{{route("menus.sort-update", $data["result"])}}', data, {
                beforeSend: function() {
                    $('#btn-save-menu').attr('disabled', 'disabled').html('<i class="fa fa-spinner fa-spin"></i>&nbsp;'+loadingText);
                },
                onComplete: function() {
                    $('#btn-save-menu').removeAttr('disabled').html(btnHtml);
                }
            });
        });
    });
</script>
@endpush
