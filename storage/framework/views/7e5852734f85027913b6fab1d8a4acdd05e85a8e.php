<div class="bg-light border-right" id="sidebar-wrapper">
    <div class="list-group list-group-flush">

    <?php $__currentLoopData = $LEFTMENU; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $itemLeft): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php ($activeClass = Route::currentRouteName() == $itemLeft->route_name ? 'active font-weight-bold bg-info' : ''); ?>
        <?php echo link_to_route($itemLeft->route_name, __($itemLeft->lang), [], [
            'class' => get_classes(['list-group-item', 'list-group-item-action', $activeClass])
        ]); ?>

    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
</div>

<?php /**PATH F:\laka\laka-management-tool\resources\views/components/system-admin/sidebar.blade.php ENDPATH**/ ?>