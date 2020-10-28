  <main>
      <!-- Hero Area Start-->
      <div class="slider-area">
          <div class="single-slider slider-height2 d-flex align-items-center">
              <div class="container">
                  <div class="row">
                      <div class="col-xl-12">
                          <div class="hero-cap text-center">
                              <h2>Cart List</h2>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
      <!--================Cart Area =================-->
      <?php if ($this->cart->contents()) : ?>
          <section class="cart_area section_padding">
              <div class="container">
                  <div class="cart_inner">
                      <div class="table-responsive">
                          <table class="table">
                              <thead>
                                  <tr>
                                      <th scope="col">Produk</th>
                                      <th scope="col">Harga</th>
                                      <th scope="col">Qty</th>
                                      <th scope="col">Toko</th>
                                      <th scope="col">Sub Total</th>
                                      <th scope="col">Action</th>
                                  </tr>
                              </thead>
                              <tbody>
                                  <?php $no = 1;
                                    foreach ($this->cart->contents() as $item) : ?>
                                      <tr>
                                          <td>
                                              <div class="media">
                                                  <div class="d-flex">
                                                      <img src="<?= base_url('assets/img/fototoko/') . $item['picture']; ?>" alt="" />
                                                  </div>
                                                  <div class="media-body">
                                                      <a href="<?= base_url('customer/detailproduk/') . $item['id']; ?>">
                                                          <p><?= $item['name']; ?></p>
                                                      </a>
                                                  </div>
                                              </div>
                                          </td>
                                          <td>
                                              <h5>Rp. <?= number_format($item['price'], 0, ',', '.') ?></h5>
                                          </td>
                                          <td>
                                              <h5 class="badge badge-light"><?= $item['qty']; ?></h5>
                                          </td>
                                          <td>
                                              <h5><?= $item['user']; ?></h5>
                                          </td>
                                          <td>
                                              <h5>Rp. <?= number_format($item['subtotal'], 0, ',', '.') ?></h5>
                                          </td>
                                          <td>
                                              <!-- DELETE -->
                                              <h3><a href="<?= base_url('customer/hapusproduk/') . $item['rowid']; ?>" class="badge badge-danger"><i class="fas fa-fw fa-trash-alt"></i></a></h3>
                                          </td>
                                      </tr>
                                  <?php endforeach; ?>

                              </tbody>
                              <?php if (!$this->cart->total_items() == 0) : ?>
                                  <tr>
                                      <td></td>
                                      <td></td>
                                      <td></td>
                                      <td>
                                          <h5>Total</h5>
                                      </td>
                                      <td>
                                          <h5>Rp. <?= number_format($this->cart->total(), 0, ',', '.'); ?></h5>
                                      </td>
                                      <td></td>
                                  </tr>
                              <?php endif; ?>
                          </table>
                          <?php if (!$this->cart->total_items() == 0) : ?>
                              <div class="checkout_btn_inner float-right">
                                  <a class="btn_1" href="<?= base_url('customer/hapuskeranjang/'); ?>">Hapus Keranjang</a>
                                  <a class="btn_1 checkout_btn_1" href="<?= base_url('customer/bayar/'); ?>">Checkout</a>
                              </div>
                          <?php endif; ?>
                      </div>
                  </div>
          </section>
      <?php endif; ?>

      <!--================End Cart Area =================-->