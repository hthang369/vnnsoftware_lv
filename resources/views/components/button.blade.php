@php
    if (!blank($name))
        $attributes->merge(['name' => $name]);

@endphp
<button type="{{$type}}" {{$attributes}}>{{$slot}}</button>
