<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800 mb-5"><?= $title; ?></h1>
    <div class="row d-flex justify-content-center">
        <div class="col-lg-12">
            <?= $this->session->flashdata('pesan'); ?>
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Nama Jam Tangan</th>
                                    <th scope="col">Subtotal</th>
                                    <th scope="col">Qty</th>
                                    <th scope="col">Status Pesanan</th>
                                    <th scope="col">Catatan</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($pesanan as $ps) : ?>
                                    <tr>
                                        <form action="<?= base_url(); ?>produk/setpesanan/<?= $ps['id']; ?> " method="POST">
                                            <th scope="row"><?= 1 + $start; ?></th>
                                            <td><?= $ps['namajam']; ?></td>
                                            <td><?= $ps['subtotal']; ?></td>
                                            <td><?= $ps['qty']; ?></td>
                                            <td>
                                                <div class="form-group">
                                                    <select class="form-control" id="status" name="status">
                                                        <option disabled selected><?= $ps['status']; ?></option>
                                                        <?php if ($ps['status'] == 'Proses') : ?>
                                                            <option value="Kirim">Kirim</option>
                                                            <option value="Selesai">Selesai</option>
                                                        <?php elseif ($ps['status'] == 'Kirim') : ?>
                                                            <option value="Selesai">Selesai</option>
                                                        <?php else : ?>
                                                            <option value="Proses">Proses</option>
                                                            <option value="Kirim">Kirim</option>
                                                            <option value="Selesai">Selesai</option>
                                                        <?php endif ?>
                                                    </select>
                                                </div>
                                            </td>
                                            <td><?= $ps['catatan']; ?></td>
                                            <td>
                                                <a href="<?= base_url(); ?>produk/detailpesanan/<?= $ps['id']; ?>" class="btn btn-warning btn-sm">
                                                    <i class="fas fa-fw fa-info-circle"></i>
                                                </a>
                                                <button type="submit" class="btn btn-success btn-sm">
                                                    SET
                                                </button>
                                            </td>
                                        </form>
                                    </tr>
                                    <?php $start++; ?>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="mt-3">
                <?= $this->pagination->create_links(); ?>
            </div>
        </div>
    </div>

</div>
</div>

<!-- <div class="form-group">
    <label for="status"></label>
    <select class="form-control" id="status">
        <option disabled selected>Status Lanjut</option>
        <option value="Sedang Di Kirim">Sedang Di Kirim</option>

        <option disabled selected>Status Lanjut</option>
        <option value="Selesai">Selesai</option>

    </select>
</div> -->