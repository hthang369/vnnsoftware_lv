<?php $__env->startSection('body_content'); ?>
    <?php echo Form::open(['route' => "{$sectionCode}.store", 'method' => 'POST']); ?>

        <?php echo $__env->yieldContent('form_content'); ?>

        <div class="form-row">
        <?php echo Form::submit(__('common.save'), ['class' => 'btn btn-primary btn-sm']); ?>

        <?php echo Form::button(__('common.back'), ['class' => 'btn btn-danger btn-sm ml-2', 'onclick' => "history.back()"]); ?>

        </div>
    <?php echo Form::close(); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('components.system-admin.form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\laka\laka-management-tool\resources\views/components/system-admin/create.blade.php ENDPATH**/ ?>