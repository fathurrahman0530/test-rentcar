<?php $__env->startSection('navbar', 'transparent'); ?>
<?php $__env->startSection('content'); ?>
<div class="no-bottom no-top" id="content">
    <div id="top"></div>
    <section id="section-hero" aria-label="section" class="full-height vertical-center"
        data-bgimage="url(<?php echo e(asset('landing')); ?>/images/background/7.jpg) bottom">
        <div class="container">
            <div class="row align-items-center">
                <div class="spacer-double sm-hide"></div>
                <div class="col-lg-6">
                    <h4><span class="id-color">Plan your trip now</span></h4>
                    <div class="spacer-10"></div>
                    <h1>Explore the world with comfortable car</h1>
                    

                    <a class="btn-main" href="<?php echo e(route('lp.cars')); ?>">Choose a Car</a>&nbsp;&nbsp;&nbsp;
                    
                </div>

                <div class="col-lg-6">
                    <img src="<?php echo e(asset('landing')); ?>/images/misc/car-2.png" class="img-fluid" alt="">
                </div>

            </div>
        </div>
    </section>

    <section id="section-cars" class="no-top">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 offset-lg-3 text-center">
                    <h2>Our Vehicle Fleet</h2>
                    
                    <div class="spacer-20"></div>
                </div>

                <div class="clearfix"></div>

                <div id="items-carousel" class="owl-carousel wow fadeIn">

                    <?php $__currentLoopData = $data['car']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-lg-12">
                        <div class="de-item mb30">
                            <div class="d-img">
                                <img src="<?php echo e(asset('img')); ?>/car/<?php echo e($c->image); ?>" class="img-fluid" alt="">
                            </div>
                            <div class="d-info">
                                <div class="d-text">
                                    <h4><?php echo e($c->name); ?></h4>
                                    
                                    
                                    <div class="d-price">
                                        Harga <span>Rp. <?php echo e(number_format($c->harga, 0,',','.')); ?></span>
                                        <a class="btn-main" href="<?php echo e(route('lp.cars')); ?>">Pesan Sekarang</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                </div>

            </div>
        </div>
    </section>

    <section id="section-img-with-tab" data-bgcolor="#f8f8f8">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-5 offset-lg-7">

                    <h2>Tentang Kami</h2>
                    <div class="spacer-20"></div>
                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="pills-home" role="tabpanel"
                            aria-labelledby="pills-home-tab">
                            <p>
                                Saudagar Rent Car –  Layanan Sewa Mobil Di Makassar , Kami Hadir menjadi pilihan terbaik dalam solusi transportasi Anda. komitmen  kami yakni memberikan pelayanan terbaik serta senantiasa menjaga loyalitas kepada pelanggan. Saudagar Rent Car – Rental Mobil Makassar  Siap memenuhi kebutuhan Anda sebagai pelanggan yang meliputi Menyediakan Mobil, Sopir & Keamanan Berkendara.
                            </p>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <div class="image-container col-md-6 pull-right" data-bgimage="url(<?php echo e(asset('img')); ?>/bg-about.png) center">
        </div>
    </section>

    <section>
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <h2>Our Service</h2>
                    <div class="spacer-20"></div>
                </div>
                <div class="col-md-3">
                    <i class="fa fa-trophy de-icon mb20"></i>
                    <h4>First Class Services</h4>
                </div>
                <div class="col-md-3">
                    <i class="fa fa-road de-icon mb20"></i>
                    <h4>24/7 road assistance</h4>
                </div>
                <div class="col-md-3">
                    <i class="fa fa-map-pin de-icon mb20"></i>
                    <h4>Free Pick-Up & Drop-Off</h4>
                </div>
            </div>
        </div>
    </section>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('landing.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u1564362/public_html/saudagarrentcar.cfteknologi/resources/views/landing/index.blade.php ENDPATH**/ ?>