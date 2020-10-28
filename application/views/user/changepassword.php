<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <div class="row">
        <div class="col-lg-10">
            <?= $this->session->flashdata('pesan'); ?>
            <div class="card">
                <div class="card-body">
                    <form action="<?= base_url('user/changepassword'); ?>" method="POST">
                        <div class="form-group">
                            <label for="password_saatini">Password Saat Ini</label>
                            <input type="password" class="form-control" id="passwod_saatini" name="password_saatini">
                            <small class="form-text text-danger"><?= form_error('password_saatini'); ?></small>
                        </div>
                        <div class="form-group">
                            <label for="password_baru1">Password Baru</label>
                            <input type="password" class="form-control" id="passwod_baru1" name="password_baru1">
                            <small class="form-text text-danger"><?= form_error('password_baru1'); ?></small>
                        </div>
                        <div class="form-group">
                            <label for="password_baru2">Konfirmasi Password</label>
                            <input type="password" class="form-control" id="password_baru2" name="password_baru2">
                            <small class="form-text text-danger"><?= form_error('password_baru2'); ?></small>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-primary float-right" type="submit">Ubah Password</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->