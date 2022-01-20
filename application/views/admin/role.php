<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
    <div class="row d-flex justify-content-center">
        <div class="col-lg-8">

            <?= form_error('role', '<div class="alert alert-danger" role="alert">', '</div>'); ?>

            <?= $this->session->flashdata('pesan'); ?>

            <div class="card">
                <div class="card-body">
                    <a href="#" class="btn btn-primary mb-3" data-toggle="modal" data-target="#tambahrole">Tambah Role Baru</a>
                    <table class="table table-hover table-striped table-bordered text-center">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Role</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1;
                            foreach ($role as $r) : ?>
                                <tr>
                                    <th scope="row"><?= $i; ?></th>
                                    <td><?= $r['role']; ?></td>
                                    <td>
                                        <!-- ACCESS -->
                                        <a href="<?= base_url(); ?>admin/roleaccess/<?= $r['id_role']; ?>" class="btn btn-warning btn-sm"><i class="fas fa-fw fa-info"></i></a>
                                        <!-- DELETE -->
                                        <a href="<?= base_url(); ?>admin/hapusrole/<?= $r['id_role']; ?>" class="btn btn-danger btn-sm"><i class="fas fa-fw fa-trash-alt"></i></a>
                                        <!-- UPDATE -->
                                        <a href="<?= base_url(); ?>admin/updaterole/<?= $r['id_role']; ?>" class="btn btn-primary btn-sm">
                                            <i class="fas fa-fw fa-pen"></i>
                                        </a>
                                    </td>
                                </tr>
                                <?php $i++; ?>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</div>
</div>
<!-- End of Main Content -->

<!-- Modal Tambah Menu -->
<div class="modal fade" id="tambahrole" tabindex="-1" aria-labelledby="tambahroleLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tambahroleLabel">Tambah Role Baru</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?php base_url('admin/role'); ?>" method="POST">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="role">Nama Role</label>
                        <input type="text" class="form-control" id="role" name="role" placeholder="Nama role" autocomplete="off">
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