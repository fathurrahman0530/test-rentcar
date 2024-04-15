<?php $__env->startSection('content'); ?>
<div class="no-bottom no-top" id="content">
    <div id="top"></div>

    <!-- section begin -->
    <section id="subheader" class="jarallax text-light">
        <img src="<?php echo e(asset('landing')); ?>/images/background/subheader.jpg" class="jarallax-img" alt="">
        <div class="center-y relative text-center">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 text-center">
                        <h1>Contact Us</h1>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
    </section>
    <!-- section close -->


    <section aria-label="section">
        <div class="container">
            <div class="row g-custom-x">

                <div class="col-lg-8 mb-sm-30">
                    <h3>Find Our Location</h3>
                    <div class="de-box mb30">
                        <iframe src="<?php echo e($data['company']->maps); ?>" width="100%" height="450" style="border:0;"
                            allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="de-box mb30">
                        <h4>US Office</h4>
                        <address class="s1">
                            <span><i class="id-color fa fa-map-marker fa-lg"></i><?php echo e($data['company']->alamat); ?></span>
                            <span><i class="id-color fa fa-phone fa-lg"></i><a
                                    href="https://wa.me/62<?php echo e(substr($data['company']->mobile_1, 1)); ?>"
                                    target="_blank">+62 <?php echo e(substr($data['company']->mobile_1, 1)); ?></a></span>
                            <span><i class="id-color fa fa-envelope-o fa-lg"></i><a
                                    href="mailto:<?php echo e($data['company']->email); ?>"
                                    target="_blank"><?php echo e($data['company']->email); ?></a></span>
                        </address>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('landing.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u1564362/public_html/saudagarrentcar.cfteknologi/resources/views/landing/contact.blade.php ENDPATH**/ ?>