<div class="bg-light border-right" id="sidebar-wrapper">
    <div class="list-group list-group-flush">

    <?php $__currentLoopData = $LEFTMENU; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $itemLeft): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php if (isset($component)) { $__componentOriginal18519c3f44ed850ce09eb5fa60268b373fac3dff = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Link::class, ['class' => 'list-group-item list-group-item-action '.e(Route::currentRouteName() == $itemLeft->route_name ? ' active font-weight-bold bg-info' : '').'','href' => route($itemLeft->route_name)]); ?>
<?php $component->withName('link'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?> <?php echo app('translator')->get($itemLeft->lang); ?> <?php if (isset($__componentOriginal18519c3f44ed850ce09eb5fa60268b373fac3dff)): ?>
<?php $component = $__componentOriginal18519c3f44ed850ce09eb5fa60268b373fac3dff; ?>
<?php unset($__componentOriginal18519c3f44ed850ce09eb5fa60268b373fac3dff); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
</div>

<?php /**PATH F:\laka\laka-management-tool\resources\views/components/system-admin/sidebar.blade.php ENDPATH**/ ?>