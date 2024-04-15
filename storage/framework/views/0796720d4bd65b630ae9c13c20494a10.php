<?php
$data['footer'] = App\Models\Company::first();
?>
<footer class="text-light mt-4">
    <div class="container">
        <div class="row g-custom-x">
            <div class="col-lg-6">
                <div class="widget">
                    <h5>About <?php echo e($data['footer']->name); ?></h5>
                    <p>melayani jasa rental / sewa mobil dengan berbabagai pilihan jenis dan merek mobil untuk pribadi, perusahaan maupun instansi pemerintah.</p>
                </div>
            </div>

            <div class="col-lg-3">
                <div class="widget">
                    <h5>Contact Info</h5>
                    <address class="s1">
                        <span><i class="id-color fa fa-map-marker fa-lg"></i><?php echo e($data['footer']->alamat); ?></span>
                        <span><i class="id-color fa fa-phone fa-lg"></i><a
                                href="https://wa.me/62<?php echo e(substr($data['footer']->mobile_1, 1)); ?>" target="_blank">(62)
                                <?php echo e(substr($data['footer']->mobile_1, 1)); ?></a></span>
                        <span><i class="id-color fa fa-envelope-o fa-lg"></i><a
                                href="mailto:<?php echo e($data['footer']->email); ?>"><?php echo e($data['footer']->email); ?></a></span>
                    </address>
                </div>
            </div>

        </div>
    </div>
    <div class="subfooter">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="de-flex">
                        <div class="de-flex-col">
                            Copyright 2023 - <?php echo e(date('Y')); ?> | <?php echo e($data['footer']->name); ?> by&nbsp;<a href="https://cfteknologi.id"
                                target="_blank">CF Teknologi</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<?php /**PATH /home/u1564362/public_html/saudagarrentcar.cfteknologi/resources/views/landing/layouts/footer.blade.php ENDPATH**/ ?>