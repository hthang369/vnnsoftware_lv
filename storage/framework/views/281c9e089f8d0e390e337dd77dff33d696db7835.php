<?php $__env->startSection('title', $titlePage); ?>

<?php $__env->startSection('content'); ?>
    <!-- TITLE -->
    <?php $__env->startSection('header_page'); ?>
        <h2 class="card-header px-0">
            <?php echo app('translator')->get($headerPage); ?>
        </h2>
    <?php echo $__env->yieldSection(); ?>

    <div class="card-body px-0">
        <?php echo $__env->yieldContent('message_content'); ?>

        <?php echo $__env->yieldContent('body_content'); ?>

        <?php echo $__env->yieldContent('body_button'); ?>
    </div>

    <?php echo $__env->yieldContent('footer_page'); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.system-admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\laka\laka-management-tool\resources\views/components/system-admin/form.blade.php ENDPATH**/ ?>