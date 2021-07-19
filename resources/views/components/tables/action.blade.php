@props(['data'])
<div>
    @foreach ($data['action'] as $item)
        @php
            $component = "tables.action_{$item['key']}";
        @endphp
        <x-dynamic-component :component="$component" :item="$item" :data-id="$data['id']"/>
    @endforeach
</div>
