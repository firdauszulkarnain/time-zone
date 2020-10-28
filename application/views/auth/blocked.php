<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Begin Page Content -->
                <div class="container-fluid mt-5">

                    <!-- 404 Error Text -->
                    <div class="text-center">
                        <div class="error mx-auto">403</div>
                        <p class="lead text-gray-800 mb-5">Access Forbidden</p>
                        <?php if ($user['role_id'] == 1) : ?>
                            <a href="<?= base_url('admin'); ?>">&larr; Back to Dashboard</a>
                        <?php elseif ($user['role_id'] == 2) : ?>
                            <a href="<?= base_url('user'); ?>">&larr; Back to Dashboard</a>
                        <?php elseif ($user['role_id'] == 3) : ?>
                            <a href="<?= base_url('customer'); ?>">&larr; Back to Dashboard</a>
                        <?php endif; ?>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->