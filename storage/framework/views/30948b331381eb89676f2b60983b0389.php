<header class="<?php echo $__env->yieldContent('navbar'); ?> header-light scroll-light has-topbar">
    <div id="topbar" class="topbar-dark text-light">
        <div class="container">
            <div class="topbar-left xs-hide">
                
                <div class="topbar-widget">
                    <div class="topbar-widget"><a href="https://wa.me/62<?php echo e(substr($data['company']->mobile_1, 1)); ?>"
                            target="_blank"><i class="fa fa-phone"></i>(62) <?php echo e(substr($data['company']->mobile_1, 1)); ?></a></div>
                    <div class="topbar-widget"><a href="mailto:<?php echo e($data['company']->email); ?>" target="_blank"><i
                                class="fa fa-envelope"></i><?php echo e($data['company']->email); ?></a></div>
                </div>
            </div>

            <div class="topbar-right">
                <div class="social-icons">
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="de-flex sm-pt10">
                    <div class="de-flex-col">
                        <div class="de-flex-col">
                            <!-- logo begin -->
                            <div id="logo">
                                <a href="<?php echo e(route('lp.home')); ?>">
                                    <img class="logo-1" src="<?php echo e(asset('img')); ?>/logo/<?php echo e($data['company']->logo); ?>"
                                        width="50px" alt="">
                                    <img class="logo-2" src="<?php echo e(asset('img')); ?>/logo/<?php echo e($data['company']->logo); ?>"
                                        width="50px" alt="">
                                </a>
                            </div>
                            <!-- logo close -->
                        </div>
                    </div>
                    <div class="de-flex-col header-col-mid">
                        <ul id="mainmenu">
                            <li><a class="menu-item" href="<?php echo e(route('lp.home')); ?>">Home</a></li>
                            <li><a class="menu-item" href="<?php echo e(route('lp.cars')); ?>">Cars</a></li>
                            <li><a class="menu-item" href="<?php echo e(route('lp.about')); ?>">About Me</a></li>
                            <li><a class="menu-item" href="<?php echo e(route('lp.contact')); ?>">Contact Us</a></li>
                        </ul>
                    </div>
                    <div class="de-flex-col">
                        <div class="menu_side_area">
                            <a href="<?php echo e(route('login')); ?>" class="btn-main">Sign In</a>
                            <span id="menu-btn"></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<?php /**PATH /home/u1564362/public_html/saudagarrentcar.cfteknologi/resources/views/landing/layouts/navbar.blade.php ENDPATH**/ ?>