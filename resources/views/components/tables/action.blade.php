@props(['data'])
<div>
    @foreach ($data['action'] as $item)
        <a name="{{$item['key']}}" class="btn btn-sm {{$item['class']}}" href="{{route("{$sectionCode}.{$item['key']}", $data['id'])}}">
            {{$item['label']}}
        </a>
    @endforeach
    <!-- Life is available only in the present moment. - Thich Nhat Hanh -->
</div>
