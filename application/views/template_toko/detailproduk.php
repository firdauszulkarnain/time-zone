<main>
    <!-- Hero Area Start-->
    <form action="<?= base_url('customer/tambahkeranjang/') . $jm['id_produk']; ?>" method="POST">
        <div class="slider-area ">
            <div class="single-slider slider-height2 d-flex align-items-center">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="hero-cap text-center">
                                <h2><?= $jm['nama']; ?></h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Hero Area End-->
        <!--================Single Product Area =================-->
        <div class="product_image_area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3">
                        <span class="contact-info__icon"><i class="ti-home"></i> <?= $jm['nama_user']; ?></span>
                    </div>

                </div>
                <div class="row justify-content-center">
                    <div class="col-lg-6 mt-3">

                        <img src="<?= base_url('assets/img/fototoko/') . $jm['gambar']; ?>" class="rounded float-left" alt="">

                    </div>
                    <div class="col-lg-6">
                        <div class="single_product_text text-center">
                            <h3><?= $jm['nama']; ?></h3>
                            <p>
                                <?= $jm['deskripsi']; ?>
                            </p>
                            <div class="card_area">
                                <div class="product_count_area">
                                    <p>Quantity</p>
                                    <div class="product_count d-inline-block">

                                        <span class="product_count_item inumber-decrement"> <i class="ti-minus"></i></span>
                                        <input class="product_count_item input-number" type="text" value="1" min="0" max="10" id="qty" name="qty">
                                        <span class="product_count_item number-increment"> <i class="ti-plus"></i></span>

                                    </div>
                                    <p><?= number_format($jm['harga'], 0, ".", "."); ?></p>
                                </div>
                                <div class="add_to_cart">
                                    <button type="submit" class="btn_3">Tambah Ke Troli</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </form>
    <!--================End Single Product Area =================-->