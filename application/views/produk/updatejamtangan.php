<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800 mb-5"><?= $title; ?></h1>
    <div class="row d-flex justify-content-center">
        <div class="col-lg-8">
            <form action="" method="POST" enctype="multipart/form-data">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group">
                            <input type="text" class="form-control" id="nama" name="nama" value="<?= $jamtangan['nama']; ?>" autocomplete="off">
                            <small class="form-text text-danger"><?= form_error('nama'); ?></small>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="harga" name="harga" value="<?= $jamtangan['harga']; ?>" autocomplete="off">
                            <small class="form-text text-danger"><?= form_error('harga'); ?></small>
                        </div>
                        <div class="form-group">
                            <label for="deskripsi">Deskripsi</label>
                            <textarea class="form-control" id="deskripsi" rows="4" name="deskripsi"><?= $jamtangan['deskripsi']; ?></textarea>
                            <small class="form-text text-danger"><?= form_error('deskripsi'); ?></small>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-3">
                                <img src="<?= base_url('assets/img/fototoko/') . $jamtangan['gambar']; ?>" class="img-thumbnail">
                            </div>
                            <div class="col-sm-9 mt-5">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="gambar" name="gambar">
                                    <label class="custom-file-label" for="gambar">Pilih Gambar Baru</label>
                                </div>
                            </div>
                        </div>
                        <a href="<?= base_url('produk'); ?>" class="btn btn-danger">Cancel</a>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
</div>
<!-- End of Main Content -->