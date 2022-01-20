<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800 mb-5"><?= $title; ?></h1>
    <div class="row d-flex justify-content-center mb-5">
        <div class="col-lg-7">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col" colspan="2">
                                        <h5><b>Data Penerima</b></h5>
                                    </th>

                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><b>Nama Penerima</b></td>
                                    <td><?= $invoice['namauser']; ?></td>
                                </tr>
                                <tr>
                                    <td><b>No. Telp</b></td>
                                    <td><?= $invoice['notelp']; ?></td>
                                </tr>
                                <tr>
                                    <td><b>Email</b></td>
                                    <td><?= $invoice['email']; ?></td>
                                </tr>
                                <tr>
                                    <td><b>Kota/Kabupaten</b></td>
                                    <td><?= $invoice['kabupaten']; ?></td>
                                </tr>
                                <tr>
                                    <td><b>Alamat</b></td>
                                    <td><?= $invoice['alamatuser']; ?></td>
                                </tr>
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
            <a href="<?= base_url('produk/invoice'); ?>" class="btn btn-danger mt-3 px-5">Kembali</a>
        </div>
        <div class="col-lg-5">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-hover table-striped table-bordered">
                                    <tbody>
                                        <tr>
                                            <td><b>Tanggal Pemesanan</b></td>
                                            <td><?= $invoice['tgl_pesanan']; ?></td>
                                        </tr>
                                        <tr>
                                            <td><b>Tanggal Selesai</b></td>
                                            <td><?= $invoice['tgl_selesai']; ?></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive table-striped table-bordered">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th scope="col" colspan="2">
                                                <h5><b>Data Produk</b></h5>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><b>Produk</b></td>
                                            <td><?= $invoice['namajam']; ?></td>
                                        </tr>
                                        <tr>
                                            <td><b>Qty</b></td>
                                            <td><?= $invoice['qty']; ?></td>
                                        </tr>
                                        <tr>
                                            <td><b>Total Harga</b></td>
                                            <td>Rp. <?= number_format($invoice['subtotal'], 0, ',', '.') ?></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
</div>