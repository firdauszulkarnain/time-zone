<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-10 offset-lg-1">
            <?= form_open_multipart('customer/customer_profile'); ?>
            <div class="card">
                <div class="card-body">
                    <div class="form-group row">
                        <label for="email" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="email" name="email" value="<?= $user['email']; ?>" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="nama" name="nama" value="<?= $user['nama']; ?>" autocomplete="off">
                            <small class="form-text text-danger"><?= form_error('nama'); ?></small>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="notelp" class="col-sm-2 col-form-label">No. Hp</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="notelp" name="notelp" value="<?= $user['notelp']; ?>" autocomplete="off">
                            <small class="form-text text-danger"><?= form_error('notelp'); ?></small>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-2">Picture</div>
                        <div class="col-sm-10">
                            <div class="row">
                                <div class="col-sm-3">
                                    <img src="<?= base_url('assets/img/profile/') . $user['foto']; ?>" class="img-thumbnail">
                                </div>
                                <div class="col-sm-9">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="image" name="image">
                                        <label class="custom-file-label" for="image">Choose file</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-10 offset-sm-2 mt-3">
                            <button type="submit" class="btn btn-primary float-right">Edit</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->