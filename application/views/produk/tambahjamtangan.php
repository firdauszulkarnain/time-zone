<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800 mb-5"><?= $title; ?></h1>
    <div class="row d-flex justify-content-center">
        <div class="col-lg-8">
            <?= form_open_multipart('produk/tambahproduk'); ?>
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Produk Jam" autocomplete="off">
                        <small class="form-text text-danger"><?= form_error('nama'); ?></small>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="harga" name="harga" placeholder="Harga Produk Jam" autocomplete="off">
                        <small class="form-text text-danger"><?= form_error('harga'); ?></small>
                    </div>
                    <div class="form-group">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="gambar" name="gambar">
                            <label class="custom-file-label" for="gambar">Pilih Gambar</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="deskripsi">Deskripsi</label>
                        <textarea class="form-control" id="deskripsi" rows="4" name="deskripsi"></textarea>
                        <small class="form-text text-danger"><?= form_error('deskripsi'); ?></small>
                    </div>
                    <div class="form-group row">
                        <div class="col-lg-10 mt-3">
                            <a href="<?= base_url('produk'); ?>" class="btn btn-danger">Cancel</a>
                            <button type="submit" class="btn btn-primary">Tambah</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<!-- End of Main Content -->