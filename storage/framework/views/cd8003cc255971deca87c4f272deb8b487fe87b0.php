<nav style="background-color: #6351ce;" class="navbar navbar-expand-lg navbar-light">
    <img style="width:5rem;" src="<?php echo e(URL::to('/')); ?>/images/logo-official.png">
    <a class="navbar-brand text-light" href="<?php echo e(URL::to('/system-admin/company')); ?>"> Management Tool</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown"
            aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav me-auto mb-2 mb-md-0">
            <?php $__currentLoopData = $TOPMENU; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $itemTop): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li class="nav-item <?php echo e(substr(Route::currentRouteName(), 0, strpos(Route::currentRouteName(), '.')) == $itemTop->group ? 'active font-weight-bold border-bottom' : ''); ?>">
                    <a class="text-light nav-link" style="font-size: 14px" aria-current="page"
                        href="<?php echo e($itemTop->route_name ? route($itemTop->route_name) : $itemTop->url); ?>"><?php echo app('translator')->get($itemTop->lang); ?></a>
                </li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
    </div>
    <div class="d-flex flex-row-reverse bd-highlight collapse navbar-collapse " id="navbarSupportedContent">
        <div class="p-2 bd-highlight dropdown dropdown-menu-left">
            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <?php echo e(Auth::user()->name); ?>

            </button>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="">
                <a class="dropdown-item d-flex" href="<?php echo e(route('logout')); ?>"
                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <?php echo e(__('Logout')); ?>

                </a>
                <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                    <?php echo csrf_field(); ?>
                </form>
                <a class="dropdown-item d-flex"
                   href="/system-admin/user-management/update-password/<?php echo e(Auth::user()->id); ?>">
                    Change password
                </a>
                
            </div>
        </div>
    </div>
</nav>
<?php /**PATH F:\laka\laka-management-tool\resources\views/components/system-admin/navbar.blade.php ENDPATH**/ ?>