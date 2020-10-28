<main>
    <!-- Hero Area Start-->
    <div class="slider-area ">
        <div class="single-slider slider-height2 d-flex align-items-center">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="hero-cap text-center">
                            <h2>Watch Shop</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Hero Area End-->
    <!-- Latest Products Start -->
    <section class="popular-items latest-padding">
        <div class="container">
            <div class="row product-btn justify-content-between mb-40">
                <div class="properties__button">
                    <!--Nav Button  -->
                    <nav>
                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                            <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">NewestArrivals</a>
                            <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false"> Price high to low</a>
                        </div>
                    </nav>
                    <!--End Nav Button  -->
                </div>
                <!-- Grid and List view -->
                <div class="grid-list-view">
                </div>
            </div>
            <!-- Nav Card -->
            <div class="tab-content" id="nav-tabContent">
                <!-- card one -->
                <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                    <div class="row">
                        <?php foreach ($jamtangan as $jm) : ?>
                            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6">
                                <div class="single-popular-items mb-50 text-center">
                                    <div class="popular-img">
                                        <a href="<?= base_url('customer/detailproduk/') . $jm['id_produk']; ?>">
                                            <img src="<?= base_url('assets/img/fototoko/') . $jm['gambar']; ?>" alt="">
                                        </a>
                                        <div class="img-cap">
                                            <a href="<?= base_url('customer/tambahkeranjang/') . $jm['id_produk']; ?>">
                                                <span>Tambah Ke Keranjang</span>
                                            </a>
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
                </div>

                <!-- Card two -->
                <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                    <div class="row">
                        <?php foreach ($prices as $pr) : ?>
                            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6">
                                <div class="single-popular-items mb-50 text-center">
                                    <div class="popular-img">
                                        <a href="<?= base_url('customer/detailproduk/') . $pr['id_produk']; ?>">
                                            <img src="<?= base_url('assets/img/fototoko/') . $pr['gambar']; ?>" alt="">
                                        </a>
                                        <div class="img-cap">
                                            <a href="<?= base_url('customer/tambahkeranjang/') . $pr['id_produk']; ?>">
                                                <span>Tambah Ke Keranjang</span>
                                            </a>
                                        </div>
                                        <div class="favorit-items">
                                            <span class="flaticon-heart"></span>
                                        </div>
                                    </div>
                                    <div class="popular-caption">
                                        <h3><a href="<?= base_url('customer/detailproduk/') . $pr['id_produk']; ?>"><?= $pr['nama']; ?></a></h3>
                                        <span>Rp. <?= number_format($pr['harga'], 0, ".", "."); ?></span>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="mt-3">
                        <?= $this->pagination->create_links(); ?>
                    </div>
                </div>
            </div>
            <!-- End Nav Card -->
        </div>
    </section>
    <!-- Latest Products End -->
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
</main>