<!--? Popular Items Start -->
<div class="popular-items section-padding30">
    <div class="container">
        <!-- Section tittle -->
        <div class="row justify-content-center">
            <div class="col-xl-7 col-lg-8 col-md-10">
                <div class="section-tittle mb-70 text-center">
                    <h2>Time Zone Items</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <?php foreach ($jamtangan as $jm) : ?>
                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6">
                    <div class="single-popular-items mb-50 text-center">

                        <div class="popular-img">
                            <a href="<?= base_url('customer/detailproduk/') . $jm['id_produk']; ?>"><img src="<?= base_url('assets/img/fototoko/') . $jm['gambar']; ?>" alt=""></a>
                            <div class="img-cap">
                                <?php if ($this->session->userdata('email')) : ?>
                                    <a href="<?= base_url('customer/tambahkeranjang/') . $jm['id_produk']; ?>"><span>Tambah Ke Troli</span></a>
                                <?php else : ?>
                                    <a href="<?= base_url('auth'); ?>"><span>Tambah Ke Troli</span></a>
                                <?php endif; ?>
                            </div>
                            <div class="favorit-items">
                                <span class="flaticon-heart"></span>
                            </div>
                        </div>
                        <div class="popular-caption">
                            <h3><a href="<?= base_url('customer/detailproduk/') . $jm['id_produk']; ?>"><?= $jm['nama']; ?></a></h3>
                            <span>Rp. <?= number_format($jm['harga'], 0, ".", "."); ?></span>
                        </div>

                    </div>
                </div>
            <?php endforeach; ?>
        </div>
        <!-- Button -->
        <div class="row justify-content-center">
            <div class="mt-3">
                <?= $this->pagination->create_links(); ?>
            </div>
            <!-- <div class="room-btn pt-70">
                <a href="catagori.html" class="btn view-btn1">View More Products</a>
            </div> -->
        </div>
    </div>
</div>
<!-- Popular Items End -->
<!--? Shop Method Start-->
<div class="shop-method-area">
    <div class="container">
        <div class="method-wrapper">
            <div class="row d-flex justify-content-between">
                <div class="col-xl-4 col-lg-4 col-md-6">
                    <div class="single-method mb-40">
                        <i class="ti-package"></i>
                        <h6>Free Shipping Method</h6>
                        <p>aorem ixpsacdolor sit ameasecur adipisicing elitsf edasd.</p>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-6">
                    <div class="single-method mb-40">
                        <i class="ti-unlock"></i>
                        <h6>Secure Payment System</h6>
                        <p>aorem ixpsacdolor sit ameasecur adipisicing elitsf edasd.</p>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-6">
                    <div class="single-method mb-40">
                        <i class="ti-reload"></i>
                        <h6>Secure Payment System</h6>
                        <p>aorem ixpsacdolor sit ameasecur adipisicing elitsf edasd.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Shop Method End-->