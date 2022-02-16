<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800 mb-5"><?= $title; ?></h1>
    <div class="row d-flex justify-content-center">
        <div class="col-lg-12">
            <?= $this->session->flashdata('pesan'); ?>
            <div class="card py-3">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered text-center dt-responsive nowrap" id="mytabel" width="100%">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Produk</th>
                                    <th scope="col">Qty</th>
                                    <th scope="col">Subtotal</th>
                                    <th scope="col">Tanggal Pesanan</th>
                                    <th scope="col">Tanggal Selesai</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($invoice as $iv) : ?>
                                    <tr>
                                        <th scope="row"></th>
                                        <td><?= $iv['nama']; ?></td>
                                        <td><?= $iv['qty']; ?></td>
                                        <td>Rp. <?= number_format($iv['total_harga'], 0, ',', '.') ?></td>
                                        <td><?= $iv['tgl_pemesanan']; ?></td>
                                        <td><?= $iv['tgl_selesai']; ?></td>
                                        <td>
                                            <a href="<?= base_url(); ?>produk/detailinvoice/<?= $iv['id']; ?>" class="btn btn-warning btn-sm">
                                                <i class="fas fa-fw fa-info-circle"></i>
                                            </a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>

</div>
</div>