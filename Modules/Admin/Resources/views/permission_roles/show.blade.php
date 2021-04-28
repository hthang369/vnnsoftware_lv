@extends('admin::layouts.master')

@section('content')
    {!! Form::open(['route' => ['role_has_permissions.update', $role_id], 'id' => 'frmPermissionRole']) !!}
    {!! $grid !!}
    {!! Form::close() !!}
@endsection

@section('scripts')
<script>
$(document).ready(function() {
    $('.btn-save').on('click', function() {
        console.log($('#frmPermissionRole'))
        $('#frmPermissionRole').submit(function(e) {
            // e.preventDefault();
            let frm = $(this);
            $.post(frm.attr('action'), frm.serialize(), function(res) {
                console.log(res)
            });
        });
    });
});
</script>
@endsection
