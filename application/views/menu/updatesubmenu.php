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
                            <label for="menu">Nama Menu</label>
                            <input type="text" class="form-control" id="title" name="title" value="<?= $submenu['title']; ?>" autocomplete="off">
                            <small class="form-text text-danger"><?= form_error('title'); ?></small>
                        </div>
                        <div class="form-group">
                            <label for="menu_id">Home Menu</label>
                            <select name="menu_id" id="menu_id" class="form-control">
                                <option value="<?= $submenu['id']; ?>"><?= $submenu['menu']; ?></option>
                                <?php foreach ($menu as $m) : ?>
                                    <option value="<?= $m['id_menu']; ?>"><?= $m['menu'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="menu_id">URL Menu</label>
                            <input type="text" class="form-control" id="url" name="url" value="<?= $submenu['url']; ?>" autocomplete="off">
                            <small class="form-text text-danger"><?= form_error('url'); ?></small>
                        </div>
                        <div class="form-group">
                            <label for="menu_id">Icon Menu</label>
                            <input type="text" class="form-control" id="icon" name="icon" autocomplete="off" value="<?= $submenu['icon']; ?>">
                            <small class="form-text text-danger"><?= form_error('icon'); ?></small>
                        </div>
                        <div class="form-group">
                            <input type="checkbox" id="is_active" name="is_active" value="1" checked>
                            <label for="is_active">Aktivasi Sub Menu</label>
                        </div>
                        <button type="submit" class="btn btn-primary float-right">Update</button>
                        <a href="<?= base_url('menu/submenu'); ?>" class="btn btn-danger">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<!-- End of Main Content -->