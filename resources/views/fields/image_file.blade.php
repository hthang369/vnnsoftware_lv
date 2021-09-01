@if ($showLabel && $showField && $options['wrapper'] !== false)
    <div {!! $options['wrapperAttrs'] !!} >
@endif

@if ($showLabel && $options['label'] !== false && $options['label_show'])
    {!! Form::customLabel($name, $options['label'], $options['label_attr']) !!}
@endif

@if ($showField)
<div class="image-file">
    @php($imgSrc = data_get($options, 'src').data_get($options, 'value'))
    <img src="{{ asset($imgSrc) }}"
        class="{{ join(' ', data_get($options, 'attr.class', [])) }}"
        loading="lazy" {!! attributes_get(array_only($options, ['width', 'height'])) !!} />
</div>
<? include helpBlockPath(); ?>
@endif

<? include errorBlockPath(); ?>

@if ($showLabel && $showField && $options['wrapper'] !== false)
    </div>
@endif
