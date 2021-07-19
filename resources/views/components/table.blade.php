<div class="{{ $responsive ? 'table-responsive' : ''}}">
    <table {!! $attributes->merge($attrs) !!}>
        <thead>
            <tr>
            @foreach ($fields as $field)
                @continue(!$field['visible'])
                <th {!! attributes_get(array_only($field, ['class'])) !!}>
                    {{ $field['label'] }}
                    @if ($field['sortable'])
                        <x-tables.table-sort :field="$field['key']" />
                    @endif
                </th>
            @endforeach
            </tr>
        </thead>
        <tbody>
            @if ($total == 0)
                <x-alert type="warning">
                    @lang('table.no_item_found')
                </x-alert>
            @else
                @foreach ($items as $item)
                <tr>
                    @foreach ($fields as $field)
                        @continue(!$field['visible'])
                        <td {!! attributes_get(array_only($field, ['class'])) !!}>
                            @if (blank($field['cell']))
                                {{ $item[$field['key']] }}
                            @else
                                <x-dynamic-component :component="$field['cell']" :data="$item"/>
                            @endif
                        </td>
                    @endforeach
                </tr>
                @endforeach
            @endif

        </tbody>
    </table>

    @if ($pages > 0)
    <div class="d-flex justify-content-between">
        <x-pagination :total="$total" :current="$currentPage" :pages="$pages" />

        <span>{{$showingResult}}</span>
    </div>
    @endif
</div>
