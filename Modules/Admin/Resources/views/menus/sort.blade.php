@extends('admin::layouts.master')

@section('content')
{!! $data['grid'] !!}

@endsection

@push('scripts')
<script src="{{ asset('js/jquery-ui-1.8.17.custom.min.js') }}"></script>
<script src="{{ asset('js/jquery.mjs.nestedSortable.js') }}"></script>
<script>
    $(document).ready(function() {
        $('ol.sortable').nestedSortable({
            handle: 'span.handle',
            items: 'li',
            toleranceElement: '> div',
            change: function(){
                console.log('Relocated item');
            }
        });
    });
</script>
@endpush
