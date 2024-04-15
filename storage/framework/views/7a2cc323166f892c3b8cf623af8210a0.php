<?php $__env->startSection('content'); ?>
<div class="no-bottom no-top zebra" id="content">
    <div id="top"></div>

    <!-- section begin -->
    <section id="subheader" class="jarallax text-light">
        <img src="<?php echo e(asset('landing')); ?>/images/background/2.jpg" class="jarallax-img" alt="">
        <div class="center-y relative text-center">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 text-center">
                        <h1>Cars</h1>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
    </section>
    <!-- section close -->

    <section id="section-cars">
        <div class="container">
            <div class="row">
                <?php $__currentLoopData = $data['car']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-xl-4 col-lg-6">
                    <div class="de-item mb30">
                        <div class="d-img">
                            <img src="<?php echo e(asset('img')); ?>/car/<?php echo e($c->image); ?>" class="img-fluid" alt="">
                        </div>
                        <div class="d-info">
                            <div class="d-text">
                                <h4><?php echo e($c->name); ?></h4>
                                
                                
                                <div class="d-price">
                                    Harga <span>Rp. <?php echo e(number_format($c->harga, 0,',','.')); ?></span>
                                    <a class="btn-main" href="javascript: void(0);" data-bs-toggle="modal"
                                        data-bs-target="#addPelanggan">Pesan
                                        Sekarang</a>
                                </div>
                                <div id="addPelanggan" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel"
                                    aria-hidden="true" data-bs-scroll="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="myModalLabel">Form Pemesanan</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <form action="<?php echo e(route('lp.store')); ?>" method="post">
                                                <?php echo csrf_field(); ?>
                                                <input type="hidden" name="act" value="Store">
                                                <div class="modal-body">
                                                    <div class="row">
                                                        <div class="col-md-6 mb-3">
                                                            <label for="name">Nama Lengkap <span
                                                                    class="text-danger">*</span></label>
                                                            <input type="text" name="name" id="name"
                                                                class="form-control">
                                                        </div>
                                                        <div class="col-md-6 mb-3">
                                                            <label for="email">Email <span
                                                                    class="text-danger">*</span></label>
                                                            <input type="email" name="email" id="email"
                                                                class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6 mb-3">
                                                            <label for="notelp">No. Telephone <span
                                                                    class="text-danger">*</span></label>
                                                            <input type="text" name="notelp" id="notelp"
                                                                class="form-control">
                                                        </div>
                                                        <div class="col-md-6 mb-3">
                                                            <label for="merk">Mobil <span
                                                                    class="text-danger">*</span></label>
                                                            <input type="text" name="merk" id="merk"
                                                                value="<?php echo e($c->name); ?>" class="form-control" readonly>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary waves-effect"
                                                        data-bs-dismiss="modal">Batal</button>
                                                    <button type="submit"
                                                        class="btn btn-primary waves-effect waves-light">Simpan</button>
                                                </div>
                                            </form>
                                        </div><!-- /.modal-content -->
                                    </div><!-- /.modal-dialog -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </section>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('landing.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u1564362/public_html/saudagarrentcar.cfteknologi/resources/views/landing/cars.blade.php ENDPATH**/ ?>