@php
  $attr = $attributes->merge($attrs);
  if (isset($errors)) {
    $attr['class'] .= $errors->has($attr['name']) ? ' is-invalid' : '';
  }
  $labelFor = sprintf('input-%s', $attr['name']);
  $classInput = $attr->except(['inputClass', 'type', 'name'])->merge(['id' => $labelFor])->getAttributes();
  if ($attr->has('required') && !str_contains($label['class'], 'required')) {
      $label['class'] .= ' required';
  }
@endphp

@if ($attr['type'] == 'hidden')
    {!! Form::hidden($attr['name'], $attr['value']) !!}
@else
    <div {!! $group['attrs'] !!}>
        @if (!empty($label['text']))
            {!! Form::label($labelFor, $label['text'] ?? '', array_except($label, ['text'])) !!}
        @endif

        <div class="{{ $attr['inputClass'] }}">
            {!! Form::input($attr['type'], $attr['name'], request()->input($attr['name'], old($attr['name'])), $classInput) !!}

            @if(!empty($help))
                <small id="help-{{ $attr['name'] }}" class="form-text text-muted">{!! $help !!}</small>
            @endif

            @if(isset($errors) && $errors->has($attr['name']))
                <div class="{{ $errors->has($attr['name']) ? 'invalid' : '' }}-feedback d-block">
                {!! $errors->first($attr['name']) !!}
                </div>
            @endif
        </div>
    </div>
@endif
