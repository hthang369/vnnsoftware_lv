@props(['data'])
<div>
    {!! link_to(route('permission-role.show', $data['id']), __('custom_label.role_setting'), ['class' => 'btn btn-sm btn-warning']) !!}
</div>
