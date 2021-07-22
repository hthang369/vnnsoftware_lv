<?php
  $attr = $attributes->merge($attrs);
  if (isset($errors)) {
    $attr['class'] .= $errors->has($attr['name']) ? ' is-invalid' : '';
  }
  $labelFor = sprintf('input-%s', $attr['name']);
  $classInput = $attr->except(['inputClass', 'type', 'name'])->merge(['id' => $labelFor])->getAttributes();
  if ($attr->has('required') && !str_contains($label['class'], 'required')) {
      $label['class'] .= ' required';
  }
?>

<?php if($attr['type'] == 'hidden'): ?>
    <?php echo Form::hidden($attr['name'], $attr['value']); ?>

<?php else: ?>
    <div <?php echo $group['attrs']; ?>>
        <?php if(!empty($label['text'])): ?>
            <?php echo Form::label($labelFor, $label['text'] ?? '', array_except($label, ['text'])); ?>

        <?php endif; ?>

        <div class="<?php echo e($attr['inputClass']); ?>">
            <?php echo Form::input($attr['type'], $attr['name'], request()->input($attr['name'], old($attr['name'])), $classInput); ?>


            <?php if(!empty($help)): ?>
                <small id="help-<?php echo e($attr['name']); ?>" class="form-text text-muted"><?php echo $help; ?></small>
            <?php endif; ?>

            <?php if(isset($errors) && $errors->has($attr['name'])): ?>
                <div class="<?php echo e($errors->has($attr['name']) ? 'invalid' : ''); ?>-feedback d-block">
                <?php echo $errors->first($attr['name']); ?>

                </div>
            <?php endif; ?>
        </div>
    </div>
<?php endif; ?>
<?php /**PATH F:\laka\laka-management-tool\resources\views/components/forms/input.blade.php ENDPATH**/ ?>