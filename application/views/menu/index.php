<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800 mb-5"><?= $title; ?></h1>
    <div class="row d-flex justify-content-center">
        <div class="col-lg-8">

            <?= form_error('menu', '<div class="alert alert-danger" role="alert">', '</div>'); ?>

            <?= $this->session->flashdata('pesan'); ?>
            <a href="#" class="btn btn-primary mb-3" data-toggle="modal" data-target="#tambahmenu">Tambah Menu Baru</a>
            <div class="card">
                <div class="card-body">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Menu</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($menu as $m) : ?>
                                <tr>
                                    <th scope="row"><?= 1 + $start; ?></th>
                                    <td><?= $m['menu']; ?></td>
                                    <td>
                                        <!-- DELETE -->
                                        <a href="<?= base_url(); ?>menu/hapusmenu/<?= $m['id_menu']; ?>" class="btn btn-danger btn-sm"><i class="fas fa-fw fa-trash-alt"></i></a>
                                        <!-- UPDATE -->
                                        <a href="<?= base_url(); ?>menu/updatemenu/<?= $m['id_menu']; ?>" class="btn btn-primary btn-sm">
                                            <i class="fas fa-fw fa-pen"></i>
                                        </a>
                                    </td>
                                </tr>
                                <?php $start++; ?>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="mt-3">
                <?= $this->pagination->create_links(); ?>
            </div>
        </div>
    </div>

</div>
</div>
<!-- End of Main Content -->

<!-- Modal Tambah Menu -->
<div class="modal fade" id="tambahmenu" tabindex="-1" aria-labelledby="tambahmenuLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tambahmenuLabel">Tambah Menu Baru</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?php base_url('menu'); ?>" method="POST">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="menu">Nama Menu</label>
                        <input type="text" class="form-control" id="menu" name="menu" placeholder="Nama Menu" autocomplete="off">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- END Tambah Menu -->