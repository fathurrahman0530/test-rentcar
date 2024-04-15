<?php $__env->startSection('content'); ?>
<div class="no-bottom no-top zebra" id="content">
    <div id="top"></div>

    <!-- section begin -->
    <section id="subheader" class="jarallax text-light">
        <img src="<?php echo e(asset('landing')); ?>/images/background/subheader.jpg" class="jarallax-img" alt="">
        <div class="center-y relative text-center">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 text-center">
                        <h1>About Us</h1>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
    </section>
    <!-- section close -->

    <section>
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-6 wow fadeInRight">
                    <h2>
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                    </h2>
                </div>
                <div class="col-lg-6 wow fadeInRight" data-wow-delay=".25s">
                    Lorem ipsum non aliquip esse do eu ad amet laboris do labore reprehenderit mollit exercitation
                    cillum irure fugiat magna laboris aliquip adipisicing consectetur officia dolor minim ea enim amet
                    in ut non non excepteur anim magna dolor nostrud commodo qui irure deserunt adipisicing nisi ex
                    nostrud sunt officia in aliquip velit anim id aliqua qui do sed non ad qui sed in aliqua sunt
                    pariatur occaecat in ullamco deserunt dolor consectetur laborum non duis occaecat nulla ut sed qui
                    sunt id ex sint sed excepteur minim nulla minim excepteur exercitation.
                </div>
            </div>
            <div class="spacer-double"></div>
            <div class="row text-center">
                <div class="col-md-3 col-sm-6 mb-sm-30">
                    <div class="de_count wow fadeInUp" data-bgcolor="#f5f5f5">
                        <h3 class="timer" data-to="15425" data-speed="3000">0</h3>
                        Hours of Work
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 mb-sm-30">
                    <div class="de_count wow fadeInUp" data-bgcolor="#f5f5f5">
                        <h3 class="timer" data-to="8745" data-speed="3000">0</h3>
                        Clients Supported
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 mb-sm-30">
                    <div class="de_count wow fadeInUp" data-bgcolor="#f5f5f5">
                        <h3 class="timer" data-to="235" data-speed="3000">0</h3>
                        Awards Winning
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 mb-sm-30">
                    <div class="de_count wow fadeInUp" data-bgcolor="#f5f5f5">
                        <h3 class="timer" data-to="15" data-speed="3000">0</h3>
                        Years Experience
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section aria-label="section" class="jarallax text-light">
        
    </section>

    <section aria-label="section">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 offset-lg-3 text-center">
                    <h2>Features Hilight</h2>
                    <div class="spacer-20"></div>
                </div>
                <div class="clearfix"></div>
                <div class="col-lg-3">
                    <div class="box-icon s2 p-small mb20 wow fadeInRight" data-wow-delay=".5s">
                        <i class="fa bg-color fa-trophy"></i>
                        <div class="d-inner">
                            <h4>First class services</h4>
                            Est dolore ut laboris eu enim eu veniam nostrud esse laborum duis consequat nostrud id
                        </div>
                    </div>
                    <div class="box-icon s2 p-small mb20 wow fadeInL fadeInRight" data-wow-delay=".75s">
                        <i class="fa bg-color fa-road"></i>
                        <div class="d-inner">
                            <h4>24/7 road assistance</h4>
                            Est dolore ut laboris eu enim eu veniam nostrud esse laborum duis consequat nostrud id
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <img src="<?php echo e(asset('landing')); ?>/images/misc/car.png" alt="" class="img-fluid wow fadeInUp">
                </div>

                <div class="col-lg-3">
                    <div class="box-icon s2 d-invert p-small mb20 wow fadeInL fadeInLeft" data-wow-delay="1s">
                        <i class="fa bg-color fa-tag"></i>
                        <div class="d-inner">
                            <h4>Quality at Minimum Expense</h4>
                            Est dolore ut laboris eu enim eu veniam nostrud esse laborum duis consequat nostrud id
                        </div>
                    </div>
                    <div class="box-icon s2 d-invert p-small mb20 wow fadeInL fadeInLeft" data-wow-delay="1.25s">
                        <i class="fa bg-color fa-map-pin"></i>
                        <div class="d-inner">
                            <h4>Free Pick-Up & Drop-Off</h4>
                            Est dolore ut laboris eu enim eu veniam nostrud esse laborum duis consequat nostrud id
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="section-img-with-tab" style="padding: 0 !important;"></section>

    <section id="section-call-to-action" class="bg-color-2 pt60 pb60 text-light">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-8">
                    <h2 class="s2">Call us for further information. Rentaly customer care is here to help you anytime.
                    </h2>
                </div>

                <div class="col-lg-4 text-lg-center text-sm-center">
                    <div class="phone-num-big">
                        <i class="fa fa-phone"></i>
                        <span class="pnb-text">Call Us Now</span>
                        <span class="pnb-num">+62 <?php echo e(substr($data['company']->mobile_1, 1)); ?></span>
                    </div>
                    <a href="https://wa.me/62<?php echo e(substr($data['company']->mobile_1, 1)); ?>" target="_blank"
                        class="btn-main">Contact Us</a>
                </div>
            </div>
        </div>
    </section>

</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('landing.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u1564362/public_html/saudagarrentcar.cfteknologi/resources/views/landing/about.blade.php ENDPATH**/ ?>