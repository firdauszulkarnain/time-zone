    <main>
        <!-- Hero Area Start-->
        <div class="slider-area ">
            <div class="single-slider slider-height2 d-flex align-items-center">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="hero-cap text-center">
                                <h2>Checkout</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--================Checkout Area =================-->
        <section class="checkout_area section_padding">
            <div class="container">
                <div class="billing_details">
                    <div class="row">
                        <div class="col-lg-8">
                            <h3>Data Penerima</h3>
                            <form class="row contact_form" action="" method="post" novalidate="novalidate">
                                <div class="col-md-12 form-group p_star">

                                    <input type="text" class="form-control" id="nama" name="nama" value="<?= $user['nama']; ?>" />
                                    <?= form_error('nama', '<small class="form-text text-danger pl-3">', '</small>'); ?>
                                </div>
                                <div class="col-md-6 form-group p_star">

                                    <input type="text" class="form-control" id="notelp" name="notelp" value="<?= $user['notelp']; ?>" />
                                    <?= form_error('notelp', '<small class="form-text text-danger pl-3">', '</small>'); ?>
                                </div>
                                <div class="col-md-6 form-group p_star">
                                    <input type="text" class="form-control" id="email" name="email" value="<?= $user['email']; ?>" readonly />
                                </div>

                                <div class="col-md-12 form-group p_star">
                                    <label for="">Alamat</label>
                                    <input type="text" class="form-control" id="alamat" name="alamat" value="<?= $user['alamat']; ?>" />
                                    <?= form_error('alamat', '<small class="form-text text-danger pl-3">', '</small>'); ?>
                                </div>


                                <div class="col-md-12 form-group p_star">
                                    <label for="">Kabupaten/Kota</label>
                                    <select class="country_select" id="kabupaten" name="kabupaten">
                                        <option value="<?= $provuser['id_kab'];  ?>"><?= $provuser['kabupaten'];  ?></option>
                                        <?php foreach ($kab as $kb) : ?>
                                            <option value="<?= $kb['id_kab']; ?>"><?= $kb['nama'] ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>


                                <div class="col-md-12 form-group p_star">
                                    <textarea class="form-control" name="catatan" id="catatan" rows="1" placeholder="Tambahkan Catatan"></textarea>
                                </div>
                                <button class="btn_3" type="submit">Lanjutkan Pembayaran</button>
                            </form>
                        </div>
                        <div class="col-lg-4">
                            <div class="order_box">
                                <h2>Time Zone Order</h2>
                                <ul class="list">
                                    <li>
                                        <a href="#">Product
                                            <span>Sub Total</span>
                                        </a>
                                    </li>
                                    <?php foreach ($this->cart->contents() as $item) : ?>
                                        <li>
                                            <a href="#"><?= $item['name']; ?>
                                                <span class="middle">x 0<?= $item['qty']; ?></span>
                                                <span class="last">Rp. <?= number_format($item['subtotal'], 0, ',', '.') ?></span>
                                            </a>
                                        </li>
                                    <?php endforeach; ?>
                                </ul>
                                <ul class="list list_2">
                                    <li>
                                        <a href="#">Total
                                            <span>Rp. <?= number_format($this->cart->total(), 0, ',', '.'); ?></span>
                                        </a>
                                    </li>
                                </ul>
                                <!-- <div class="creat_account">
                                    <input type="checkbox" id="f-option4" name="selector" />
                                    <label for="f-option4">I’ve read and accept the </label>
                                    <a href="#">terms & conditions*</a>
                                </div> -->

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--================End Checkout Area =================-->