@extends('admin::layouts.master')

@section('content')
{!! $data['grid'] !!}
@endsection

@section('scripts')
<script>
    $(document).ready(function() {
        $('#menu_type').change(function(e) {
            location.href = "{{route('menus.index')}}/" + $(this).val();
        });
        $(document).on('change', '#tablist', function(e) {
            $('.tab-pane').removeClass('show active')
            $('#link_'+$(this).val()).addClass('show active')
        });
    });
</script>
@endsection
