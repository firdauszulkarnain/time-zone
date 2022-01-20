<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800 mb-5"><?= $title; ?></h1>
    <div class="row d-flex justify-content-center">
        <div class="col-lg-12">
            <?= $this->session->flashdata('pesan'); ?>
            <div class="card mb-5">
                <div class="card-body">
                    <a href="<?= base_url('produk/tambahproduk') ?>" class="btn btn-primary mb-3">Tambah Produk Jam Baru</a>
                    <div class="table-responsive">
                        <table class="table table-hover table-striped table-bordered text-center">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Nama Jam Tangan</th>
                                    <th scope="col">Harga</th>
                                    <th scope="col" width="15%">Gambar</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($jamtangan as $jm) : ?>
                                    <tr>
                                        <th scope="row" class="align-middle"><?= 1 + $start; ?></th>
                                        <td class="align-middle"><?= $jm['nama']; ?></td>
                                        <td class="align-middle">Rp. <?= number_format($jm['harga'], 0, ',', '.') ?></td>
                                        <td>
                                            <img src="<?= base_url() ?>/assets/img/fototoko/<?= $jm['gambar']; ?>" alt="<?= $jm['gambar']; ?>" class="img-thumbnail">
                                        </td>
                                        <td class="align-middle">
                                            <!-- DELETE -->
                                            <a href="<?= base_url(); ?>produk/hapusproduk/<?= $jm['id_produk']; ?>" class="btn btn-danger btn-sm"><i class="fas fa-fw fa-trash-alt"></i></a>
                                            <!-- UPDATE -->
                                            <a href="<?= base_url(); ?>produk/updateproduk/<?= $jm['id_produk']; ?>" class="btn btn-primary btn-sm">
                                                <i class="fas fa-fw fa-pen"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <?php $start++; ?>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                        <div class="mt-3 float-right">
                            <?= $this->pagination->create_links(); ?>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

</div>
</div>