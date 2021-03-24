@if ($showLabel && $showField && $options['wrapper'] !== false)
    <div {!! $options['wrapperAttrs'] !!} >
@endif

@if ($showLabel && $options['label'] !== false && $options['label_show'])
    {!! Form::customLabel($name, $options['label'], $options['label_attr']) !!}
@endif

@if ($showField)
<div class="image-file">
    <img src="{{ data_get($options, 'src', '') }}" class="{{ join(' ', data_get($options, 'attr.class', [])) }}" />
</div>
<? include helpBlockPath(); ?>
@endif

<? include errorBlockPath(); ?>

@if ($showLabel && $showField && $options['wrapper'] !== false)
    </div>
@endif
