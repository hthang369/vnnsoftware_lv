@php
  $attr = $attributes->merge($attrs);
  if (isset($errors)) {
    $attr['class'] .= $errors->has($attr['name']) ? ' is-invalid' : '';
  }
  $labelFor = sprintf('checkbox-%s', $attr['name']);
  $value = request()->input($attr['name'], old($attr['name']));
  $attrCheckbox = $attr->except(['inputClass', 'type', 'name'])->merge(['id' => $labelFor])->getAttributes();
@endphp

<div {!! $group['attrs'] !!}>
    @if (!empty($label['text']))
        {!! Form::label($attr['name'], $label['text'] ?? '', array_except($label, ['text'])) !!}
    @endif

    <div class="{{ $attr['inputClass'] }}">

      <div class="custom-control custom-checkbox">
        {!! Form::checkbox($attr['name'], $value, false, $attrCheckbox) !!}

        @if(!empty($caption['text']))
            {!! Form::label($labelFor, $caption['text'], array_except($caption, ['text'])) !!}
        @endif

        @if(isset($errors) && $errors->has($attr['name']))
          <div class="{{ $errors->has($attr['name']) ? 'invalid' : '' }}-feedback d-block">
            {!! $errors->first($attr['name']) !!}
          </div>
        @endif
      </div>

    </div>
</div>
