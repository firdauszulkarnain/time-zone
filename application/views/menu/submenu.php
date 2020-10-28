<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800 mb-5"><?= $title; ?></h1>
    <div class="row d-flex justify-content-center">
        <div class="col-lg-11">
            <?php if (validation_errors()) : ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <?= validation_errors(); ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php endif; ?>

            <?= $this->session->flashdata('pesan'); ?>
            <a href="#" class="btn btn-primary mb-3" data-toggle="modal" data-target="#tambahsubmenu">Tambah Sub Menu Baru</a>
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Judul Sub Menu</th>
                                    <th scope="col">Home Menu</th>
                                    <th scope="col">URL</th>
                                    <th scope="col">Icon</th>
                                    <th scope="col">Active</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($submenu as $sm) : ?>
                                    <tr>
                                        <th scope="row"><?= 1 + $start; ?></th>
                                        <td><?= $sm['title']; ?></td>
                                        <td><?= $sm['menu']; ?></td>
                                        <td><?= $sm['url']; ?></td>
                                        <td><?= $sm['icon']; ?></td>
                                        <td><?= $sm['is_active']; ?></td>
                                        <td>
                                            <!-- DELETE -->
                                            <a href="<?= base_url(); ?>menu/hapussubmenu/<?= $sm['id']; ?>" class="btn btn-danger btn-sm"><i class="fas fa-fw fa-trash-alt"></i></a>
                                            <!-- UPDATE -->
                                            <a href="<?= base_url(); ?>menu/updatesubmenu/<?= $sm['id']; ?>" class="btn btn-primary btn-sm">
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
<div class="modal fade" id="tambahsubmenu" tabindex="-1" aria-labelledby="tambahsubmenuLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tambahsubmenuLabel">Tambah Sub Menu Baru</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?php base_url('menu/submenu'); ?>" method="POST">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" class="form-control" id="title" name="title" placeholder="Nama Sub Menu" autocomplete="off">

                    </div>
                    <div class="form-group">
                        <select name="menu_id" id="menu_id" class="form-control">
                            <option value="">Select Menu</option>
                            <?php foreach ($menu as $m) : ?>
                                <option value="<?= $m['id_menu']; ?>"><?= $m['menu'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="url" name="url" placeholder="URL" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="icon" name="icon" placeholder="Icon Sub Menu" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <input type="checkbox" id="is_active" name="is_active" value="1" checked>
                        <label for="is_active">Aktivasi Sub Menu</label>
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