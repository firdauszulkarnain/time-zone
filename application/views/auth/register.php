<body class="bg-gradient-primary">
    <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5 col-lg-7 mx-auto">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">FORM REGISTRASI<strong><?= $regis; ?></strong></h1>
                            </div>
                            <form class="user" method="POST" action="">
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" id="nama" placeholder="Nama Lengkap" name="nama" autocomplete="off" value="<?= set_value('nama');  ?>">
                                    <?= form_error('nama', '<small class="form-text text-danger pl-3">', '</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" id="email" placeholder="Email Address" name="email" autocomplete="off" value="<?= set_value('email');  ?>">
                                    <?= form_error('email', '<small class="form-text text-danger pl-3">', '</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" id="notelp" placeholder="No Telephone" name="notelp" autocomplete="off" value="<?= set_value('notelp');  ?>">
                                    <?= form_error('notelp', '<small class="form-text text-danger pl-3">', '</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <select class="selectpicker form-control" id="kabupaten" name="kabupaten" required title="Kabupaten/Kota" data-size="7" data-live-search="true">
                                        <?php foreach ($kabupaten as $kb) : ?>
                                            <option value="<?= $kb['id_kab']; ?>"><?= $kb['nama'] ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                    <?= form_error('provinsi', '<small class="form-text text-danger pl-3">', '</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" id="alamat" placeholder="Alamat Lengkap" name="alamat" autocomplete="off" value="<?= set_value('alamat');  ?>">
                                    <?= form_error('alamat', '<small class="form-text text-danger pl-3">', '</small>'); ?>
                                </div>

                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="password" class="form-control form-control-user" id="password1" placeholder="Password" name="password1" autocomplete="off">
                                        <?= form_error('password1', '<small class="form-text text-danger pl-3">', '</small>'); ?>
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="password" class="form-control form-control-user" id="password2" placeholder="Konfirmasi Password" name="password2" autocomplete="off">
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary btn-user btn-block">
                                    Register Akun
                                </button>
                            </form>
                            <hr>
                            <div class="text-center">
                                <a class="small" href="<?= base_url(''); ?>auth">Already have an account? Login!</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>