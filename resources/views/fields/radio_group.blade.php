@if ($showLabel && $showField && $options['wrapper'] !== false)
    <div {!! $options['wrapperAttrs'] !!} >
@endif

@if ($showLabel && $options['label'] !== false && $options['label_show'])
    {!! Form::customLabel($name, $options['label'], $options['label_attr']) !!}
@endif

@if ($showField)
<div class="custom-radio-group">
    @foreach ($options['choices'] as $key => $value)
    <div class="custom-control custom-radio ">
        {!! Form::radio("radio-$key", $key, $options['value'], ['class' => 'custom-control-input', 'id' => "radio-$key"]) !!}
        {!! Form::label("radio-$key", $value, ['class' => 'custom-control-label']) !!}
    </div>
    @endforeach
</div>
<? include helpBlockPath(); ?>
@endif

<? include errorBlockPath(); ?>

@if ($showLabel && $showField && $options['wrapper'] !== false)
    </div>
@endif
