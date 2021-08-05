<?php $__env->startSection('form_content'); ?>
    <?php if (isset($component)) { $__componentOriginal2b904c5a0b79c17065dca13c098f664737a9ad42 = $component; } ?>
<?php $component = $__env->getContainer()->make(Laka\Core\Components\Forms\Group::class, ['inline' => true]); ?>
<?php $component->withName('form-group'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
        <?php if (isset($component)) { $__componentOriginal73fa03b711eb3f9df17bbf338feff3f584b8f06d = $component; } ?>
<?php $component = $__env->getContainer()->make(Laka\Core\Components\Forms\Label::class, []); ?>
<?php $component->withName('form-label'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['class' => 'col-sm-2 col-form-label required']); ?><?php echo app('translator')->get('custom_label.name'); ?> <?php if (isset($__componentOriginal73fa03b711eb3f9df17bbf338feff3f584b8f06d)): ?>
<?php $component = $__componentOriginal73fa03b711eb3f9df17bbf338feff3f584b8f06d; ?>
<?php unset($__componentOriginal73fa03b711eb3f9df17bbf338feff3f584b8f06d); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
        <?php if (isset($component)) { $__componentOriginal83b52c6c2e21720b460cf28fe9f0e50126fd91c9 = $component; } ?>
<?php $component = $__env->getContainer()->make(Laka\Core\Components\Forms\Input::class, ['type' => 'text','name' => 'name','groupClass' => 'col-sm-10 form-row']); ?>
<?php $component->withName('form-input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['placeholder' => ''.e(__('custom_label.name')).'','required' => true,'autocomplete' => true]); ?>
<?php if (isset($__componentOriginal83b52c6c2e21720b460cf28fe9f0e50126fd91c9)): ?>
<?php $component = $__componentOriginal83b52c6c2e21720b460cf28fe9f0e50126fd91c9; ?>
<?php unset($__componentOriginal83b52c6c2e21720b460cf28fe9f0e50126fd91c9); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
     <?php if (isset($__componentOriginal2b904c5a0b79c17065dca13c098f664737a9ad42)): ?>
<?php $component = $__componentOriginal2b904c5a0b79c17065dca13c098f664737a9ad42; ?>
<?php unset($__componentOriginal2b904c5a0b79c17065dca13c098f664737a9ad42); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
    <?php if (isset($component)) { $__componentOriginal2b904c5a0b79c17065dca13c098f664737a9ad42 = $component; } ?>
<?php $component = $__env->getContainer()->make(Laka\Core\Components\Forms\Group::class, ['inline' => true]); ?>
<?php $component->withName('form-group'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
        <?php if (isset($component)) { $__componentOriginal73fa03b711eb3f9df17bbf338feff3f584b8f06d = $component; } ?>
<?php $component = $__env->getContainer()->make(Laka\Core\Components\Forms\Label::class, []); ?>
<?php $component->withName('form-label'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['class' => 'col-sm-2 col-form-label required']); ?><?php echo app('translator')->get('custom_label.maximum_storage_file'); ?> <?php if (isset($__componentOriginal73fa03b711eb3f9df17bbf338feff3f584b8f06d)): ?>
<?php $component = $__componentOriginal73fa03b711eb3f9df17bbf338feff3f584b8f06d; ?>
<?php unset($__componentOriginal73fa03b711eb3f9df17bbf338feff3f584b8f06d); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
        <?php if (isset($component)) { $__componentOriginal83b52c6c2e21720b460cf28fe9f0e50126fd91c9 = $component; } ?>
<?php $component = $__env->getContainer()->make(Laka\Core\Components\Forms\Input::class, ['type' => 'text','name' => 'maximum_storage_file','groupClass' => 'col-sm-10 form-row']); ?>
<?php $component->withName('form-input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['placeholder' => ''.e(__('custom_label.maximum_storage_file')).'','required' => true,'autocomplete' => true]); ?>
<?php if (isset($__componentOriginal83b52c6c2e21720b460cf28fe9f0e50126fd91c9)): ?>
<?php $component = $__componentOriginal83b52c6c2e21720b460cf28fe9f0e50126fd91c9; ?>
<?php unset($__componentOriginal83b52c6c2e21720b460cf28fe9f0e50126fd91c9); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
     <?php if (isset($__componentOriginal2b904c5a0b79c17065dca13c098f664737a9ad42)): ?>
<?php $component = $__componentOriginal2b904c5a0b79c17065dca13c098f664737a9ad42; ?>
<?php unset($__componentOriginal2b904c5a0b79c17065dca13c098f664737a9ad42); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
    <?php if (isset($component)) { $__componentOriginal2b904c5a0b79c17065dca13c098f664737a9ad42 = $component; } ?>
<?php $component = $__env->getContainer()->make(Laka\Core\Components\Forms\Group::class, ['inline' => true]); ?>
<?php $component->withName('form-group'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
        <?php if (isset($component)) { $__componentOriginal73fa03b711eb3f9df17bbf338feff3f584b8f06d = $component; } ?>
<?php $component = $__env->getContainer()->make(Laka\Core\Components\Forms\Label::class, []); ?>
<?php $component->withName('form-label'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['class' => 'col-sm-2 col-form-label']); ?><?php echo app('translator')->get('custom_label.description'); ?> <?php if (isset($__componentOriginal73fa03b711eb3f9df17bbf338feff3f584b8f06d)): ?>
<?php $component = $__componentOriginal73fa03b711eb3f9df17bbf338feff3f584b8f06d; ?>
<?php unset($__componentOriginal73fa03b711eb3f9df17bbf338feff3f584b8f06d); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
        <?php if (isset($component)) { $__componentOriginal31d30773e7fc225542e05b16e938e1ae0891d940 = $component; } ?>
<?php $component = $__env->getContainer()->make(Laka\Core\Components\Forms\Textarea::class, ['name' => 'description','groupClass' => 'col-sm-10 form-row']); ?>
<?php $component->withName('form-textarea'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['rows' => 5,'placeholder' => ''.e(__('custom_label.description')).'','autocomplete' => true]); ?>
<?php if (isset($__componentOriginal31d30773e7fc225542e05b16e938e1ae0891d940)): ?>
<?php $component = $__componentOriginal31d30773e7fc225542e05b16e938e1ae0891d940; ?>
<?php unset($__componentOriginal31d30773e7fc225542e05b16e938e1ae0891d940); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
     <?php if (isset($__componentOriginal2b904c5a0b79c17065dca13c098f664737a9ad42)): ?>
<?php $component = $__componentOriginal2b904c5a0b79c17065dca13c098f664737a9ad42; ?>
<?php unset($__componentOriginal2b904c5a0b79c17065dca13c098f664737a9ad42); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('components.system-admin.create', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\laka\laka-management-tool\resources\views/business-plan/create.blade.php ENDPATH**/ ?>