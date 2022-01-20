<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800 mb-3"><?= $title; ?></h1>
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
                                    <td><?= $pesanan['namauser']; ?></td>
                                </tr>
                                <tr>
                                    <td><b>No. Telp</b></td>
                                    <td><?= $pesanan['notelp']; ?></td>
                                </tr>
                                <tr>
                                    <td><b>Email</b></td>
                                    <td><?= $pesanan['email']; ?></td>
                                </tr>
                                <tr>
                                    <td><b>Kota/Kabupaten</b></td>
                                    <td><?= $pesanan['kabupaten']; ?></td>
                                </tr>
                                <tr>
                                    <td><b>Alamat</b></td>
                                    <td><?= $pesanan['alamatuser']; ?></td>
                                </tr>
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
            <a href="<?= base_url('produk/pesanan'); ?>" class="btn btn-danger mt-3 px-5">Kembali</a>
        </div>
        <div class="col-lg-5">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover table-striped table-bordered">
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
                                    <td><?= $pesanan['namajam']; ?></td>
                                </tr>
                                <tr>
                                    <td><b>Qty</b></td>
                                    <td><?= $pesanan['qty']; ?></td>
                                </tr>
                                <tr>
                                    <td><b>Total Harga</b></td>
                                    <td><?= $pesanan['subtotal']; ?></td>
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