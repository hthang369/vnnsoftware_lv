@if ($showLabel && $showField && $options['wrapper'] !== false)
    <div {!! $options['wrapperAttrs'] !!} >
@endif

@if ($showLabel && $options['label'] !== false && $options['label_show'])
    {!! Form::customLabel($name, $options['label'], $options['label_attr']) !!}
@endif

@if ($showField)
<div class="custom-checkbox-group">
    @foreach ($options['choices'] as $key => $value)
    <div class="custom-control custom-checkbox custom-control-inline">
        {!! Form::checkbox("checkbox-$key", $key, data_get($options['value'], $loop->index), ['class' => 'custom-control-input', 'id' => "checkbox-$key"]) !!}
        {!! Form::label("checkbox-$key", $value, ['class' => 'custom-control-label']) !!}
    </div>
    @endforeach
</div>
<? include helpBlockPath(); ?>
@endif

<? include errorBlockPath(); ?>

@if ($showLabel && $showField && $options['wrapper'] !== false)
    </div>
@endif
