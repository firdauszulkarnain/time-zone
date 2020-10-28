<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800 mb-5"><?= $title; ?></h1>
    <div class="row">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">
                    <form action="" method="POST">
                        <div class="form-group">
                            <label for="role">Role</label>
                            <input type="text" class="form-control" id="role" name="role" value="<?= $role['role']; ?>" autocomplete="off">
                            <small class="form-text text-danger"><?= form_error('role'); ?></small>
                        </div>
                        <button type="submit" class="btn btn-primary float-right">Update</button>
                        <a href="<?= base_url('menu'); ?>" class="btn btn-danger">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<!-- End of Main Content -->