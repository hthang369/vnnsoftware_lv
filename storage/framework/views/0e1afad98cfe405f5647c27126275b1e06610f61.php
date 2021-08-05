<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="referrer" content="strict-origin"/>
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <title>Laka Management - <?php echo $__env->yieldContent('title'); ?></title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <!-- pjax js (required) -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.pjax/2.0.1/jquery.pjax.min.js"></script>
    <script src="<?php echo e(asset('js/grid.js')); ?>"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <!-- FONT AWESOME -->


    <link rel="stylesheet" href="<?php echo e(asset('css/system-admin.css')); ?>" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">

    <!-- CSS -->
    <?php echo $__env->yieldContent('style-css'); ?>
</head>
<body>

<div id="page-container">
    <!-- Navbar -->
    <?php echo $__env->make('components.system-admin.navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <!-- Dialog confirm delete -->
    <div class="modal fade" id="confirmDialogDelete" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    </div>

    <!-- Toasts notification -->
    <?php if (isset($component)) { $__componentOriginal440ae286f8f09d008911e33dcb596d0e8c6bdd79 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Toasts::class, []); ?>
<?php $component->withName('toasts'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['class' => 'abc','id' => 'cbv']); ?>
<?php if (isset($__componentOriginal440ae286f8f09d008911e33dcb596d0e8c6bdd79)): ?>
<?php $component = $__componentOriginal440ae286f8f09d008911e33dcb596d0e8c6bdd79; ?>
<?php unset($__componentOriginal440ae286f8f09d008911e33dcb596d0e8c6bdd79); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>

    <div id="main-container" class="container-fluid m-0 pl-0">
        <div class="row">
            <!-- Sidebar -->
            <div class="col-lg-2 pr-0">
                <?php echo $__env->make('components.system-admin.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
            <!-- Main content -->
            <div class="col-lg-10 px-0">
                <div class="card px-3">
                    <?php if(session('messCommon')): ?>
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <?php echo e(session('messCommon')); ?>

                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    <?php endif; ?>
                    <?php if(session('errorCommon')): ?>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <?php echo e(session('errorCommon')); ?>

                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    <?php endif; ?>
                    <?php echo $__env->yieldContent('content'); ?>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <?php echo $__env->make('components.system-admin.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <!-- Script -->
    <?php echo $__env->yieldPushContent('scripts'); ?>
    <?php echo $__env->yieldPushContent('styles'); ?>

</div>

</body>
</html>
<?php /**PATH F:\laka\laka-management-tool\resources\views/layouts/system-admin.blade.php ENDPATH**/ ?>