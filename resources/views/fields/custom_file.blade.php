@if ($showLabel && $showField && $options['wrapper'] !== false)
    <div {!! $options['wrapperAttrs'] !!} >
@endif

@if ($showLabel && $options['label'] !== false && $options['label_show'])
    {!! Form::customLabel($name, $options['label'], $options['label_attr']) !!}
@endif

@if ($showField)
<div class="custom-file">
    {!! Form::file($name, [
        'class' => 'custom-file-input',
        'id' => 'customFile'
    ]) !!}
    {!! Form::label('customFile', trans('choose_file'), ['class' => 'custom-file-label']) !!}
</div>
<? include helpBlockPath(); ?>
@endif

<? include errorBlockPath(); ?>

@if ($showLabel && $showField && $options['wrapper'] !== false)
    </div>
@endif
