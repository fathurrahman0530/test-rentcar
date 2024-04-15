<div class="vertical-menu">

    <div data-simplebar class="h-100">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <?php if(Auth::user()->role == 1 || Auth::user()->role == 2 || Auth::user()->role == 3): ?>
                    <li class="menu-title">Menu</li>

                    <li class="<?php echo $__env->yieldContent('mm.db.home'); ?>">
                        <a href="<?php echo e(route('db.home')); ?>" class="<?php echo $__env->yieldContent('db.home'); ?>">
                            <i class="mdi mdi-home-circle-outline"></i>
                            <span>Dashboard</span>
                        </a>
                    </li>

                    <li class="menu-title">SPK</li>

                    <li class="<?php echo $__env->yieldContent('mm.db.spk.penyewaan'); ?>">
                        <a href="<?php echo e(route('db.spk.penyewaan')); ?>" class="<?php echo $__env->yieldContent('db.spk.penyewaan'); ?>">
                            <i class="mdi mdi-invoice-text-edit"></i>
                            <span>Data Penyewaan</span>
                        </a>
                    </li>

                    <li class="<?php echo $__env->yieldContent('mm.db.spk.riwayat.penyewaan'); ?>">
                        <a href="<?php echo e(route('db.spk.riwayat.penyewaan')); ?>" class="<?php echo $__env->yieldContent('db.spk.riwayat.penyewaan'); ?>">
                            <i class="mdi mdi-invoice-text-clock"></i>
                            <span>Riwayat Penyewaan</span>
                        </a>
                    </li>
                <?php endif; ?>

                <?php if(Auth::user()->role == 1 || Auth::user()->role == 2 || Auth::user()->role == 3): ?>
                    <li class="menu-title">Master Data</li>

                    <li class="<?php echo $__env->yieldContent('mm.db.master.mobil'); ?>">
                        <a href="<?php echo e(route('db.master.mobil')); ?>" class="<?php echo $__env->yieldContent('db.master.mobil'); ?>">
                            <i class="mdi mdi-car-hatchback"></i>
                            <span>Data Mobil</span>
                        </a>
                    </li>

                    <li class="<?php echo $__env->yieldContent('mm.db.master.pelanggan'); ?>">
                        <a href="<?php echo e(route('db.master.pelanggan')); ?>" class="<?php echo $__env->yieldContent('db.master.pelanggan'); ?>">
                            <i class="mdi mdi-account-group"></i>
                            <span>Data Pelanggan</span>
                        </a>
                    </li>

                    <li class="<?php echo $__env->yieldContent('mm.db.master.user'); ?>">
                        <a href="<?php echo e(route('db.master.user')); ?>" class="<?php echo $__env->yieldContent('db.master.user'); ?>">
                            <i class="mdi mdi-account-group"></i>
                            <span>Data User</span>
                        </a>
                    </li>

                    <li class="<?php echo $__env->yieldContent('mm.db.master.merk'); ?>">
                        <a href="<?php echo e(route('db.master.merk')); ?>" class="<?php echo $__env->yieldContent('db.master.merk'); ?>">
                            <i class="mdi mdi-car-multiple"></i>
                            <span>Data Brand</span>
                        </a>
                    </li>
                <?php endif; ?>
            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
<?php /**PATH C:\laragon\www\pribadi\saudagarrentcar.cfteknologi\resources\views/dashboard/layouts/sidebar.blade.php ENDPATH**/ ?>