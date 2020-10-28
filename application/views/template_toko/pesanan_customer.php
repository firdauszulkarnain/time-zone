<main>
    <!-- Hero Area Start-->
    <div class="slider-area ">
        <div class="single-slider slider-height2 d-flex align-items-center">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="hero-cap text-center">
                            <h2>Pesanan Saya</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--================Cart Area =================-->
    <section class="cart_area section_padding">
        <div class="container">
            <div class="cart_inner">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Produk</th>
                                <th scope="col">Qty</th>
                                <th scope="col">Sub Total</th>
                                <th scope="col">Tanggal Pemesanan</th>
                                <th scope="col">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1;
                            foreach ($pesanan as $ps) : ?>
                                <tr>
                                    <td>
                                        <a href="<?= base_url('customer/detailproduk/') . $ps['idproduk']; ?>">
                                            <p><?= $ps['namajam']; ?></p>
                                        </a>
                                    <td>
                                        <h5 class="badge badge-light"><?= $ps['qty']; ?></h5>
                                    </td>
                                    <td>
                                        <h5>Rp. <?= number_format($ps['subtotal'], 0, ',', '.') ?></h5>
                                    </td>
                                    <td>
                                        <h5><?= $ps['tgl_pesanan']; ?></h5>
                                    </td>
                                    <td>
                                        <h5><?= $ps['status']; ?></h5>
                                    </td>
                                </tr>
                            <?php endforeach; ?>

                        </tbody>
                    </table>
                </div>
            </div>
    </section>
    <!--================End Cart Area =================-->