<a <?php echo $attributes->merge($attrs); ?>>
  <?php if($trim): ?>
    <?php echo \mb_strimwidth($text, 0, $trim + 3, '...'); ?>

  <?php elseif(!blank($text)): ?>
    <?php echo $text; ?>

  <?php else: ?>
    <?php echo e($slot); ?>

  <?php endif; ?>
</a>
<?php /**PATH F:\laka\laka-management-tool\resources\views/components/link.blade.php ENDPATH**/ ?>