@props(['data'])
@php

    $permissions = json_decode($data['permission'], true);
    $permissions = array_intersect_key($permissions, array_flip($data['available_actions']));
@endphp
<div class="form-row">
    @foreach ($permissions as $action => $value)
    <div class="custom-control custom-checkbox mr-2">
        {!! Form::checkbox($action, 1, (bool)$value, ['class' => 'custom-control-input', 'id' => sprintf('checkbox-%s', $action)]) !!}
        {!! Form::label(sprintf('checkbox-%s', $action), __("$action"), ['class' => 'custom-control-label']) !!}
    </div>
    @endforeach

</div>
