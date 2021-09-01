@if ($showLabel && $showField && $options['wrapper'] !== false)
    <div {!! $options['wrapperAttrs'] !!} >
@endif

@if ($showLabel && $options['label'] !== false && $options['label_show'])
    {!! Form::customLabel($name, $options['label'], $options['label_attr']) !!}
@endif

@if ($showField)
<div class="embed-responsive {{ data_get($options, 'attr.parent_class') }}">
    @isset($option['src'])
        <iframe src="{{ data_get($options, 'src', '') }}" class="{{ join(' ', data_get($options, 'attr.class', [])) }}"></iframe>
    @else
        {!! $options['value'] !!}
    @endisset
</div>
<? include helpBlockPath(); ?>
@endif

<? include errorBlockPath(); ?>

@if ($showLabel && $showField && $options['wrapper'] !== false)
    </div>
@endif
