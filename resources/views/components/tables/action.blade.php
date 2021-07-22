@props(['data'])
<div>
    @foreach ($data['action'] as $item)
        @continue(!$item['visible'])
        @php
            $component = "tables.action_{$item['key']}";
        @endphp
        <x-dynamic-component :component="$component" :item="$item" :data-id="$data['id']"/>
    @endforeach
</div>
