@props(['data'])
<div>
    {!! link_to(route('permission-role.show', $data['id']), __('common.role_setting'), ['class' => 'btn btn-sm btn-info']) !!}
</div>
