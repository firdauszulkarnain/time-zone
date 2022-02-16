  <!-- Sidebar -->
  <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

     <!-- Sidebar - Brand -->
     <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon">
           <i class="far fa-clock"></i>
        </div>
        <div class="sidebar-brand-text mx-3">TimeZone</div>
     </a>

     <!-- Divider -->
     <hr class="sidebar-divider">

     <!-- QUERY MENU -->
     <?php
      $role_id = $this->session->userdata('role_id');

      $query = "  SELECT `user_menu`.`id_menu`, `menu`
                    FROM `user_menu` JOIN `user_access_menu`
                    ON `user_menu`.`id_menu` = `user_access_menu`.`menu_id`
                    WHERE `user_access_menu`.`role_id` = $role_id
                    ORDER BY `user_access_menu`.`menu_id` ASC";

      $menu = $this->db->query($query)->result_array();
      ?>

     <!-- Looping Menu -->
     <!-- Heading -->
     <?php foreach ($menu as $m) : ?>
        <div class="sidebar-heading">
           <?= $m['menu']; ?>
        </div>

        <!-- SUB MENU -->

        <?php
         $menuid = $m['id_menu'];
         $querysubmenu = "  SELECT *
                             FROM `user_sub_menu` JOIN `user_menu`
                              ON `user_sub_menu`.`menu_id` = `user_menu`.`id_menu`
                           WHERE `user_sub_menu`.`menu_id` = $menuid 
                           AND `user_sub_menu`.`is_active` = 1";

         $submenu = $this->db->query($querysubmenu)->result_array();
         ?>

        <?php foreach ($submenu as $sm) : ?>
           <!-- Nav Item - Dashboard -->
           <!-- Jika Menu Aktif -->
           <?php if ($title == $sm['title']) :  ?>
              <li class="nav-item active">
              <?php else : ?>
              <li class="nav-item">
              <?php endif; ?>
              <a class="nav-link pb-0" href="<?= base_url($sm['url']); ?>">
                 <i class="<?= $sm['icon']; ?>"></i>
                 <span><?= $sm['title']; ?></span></a>
              </li>
           <?php endforeach; ?>
           <!-- Divider -->
           <hr class="sidebar-divider mt-3">
        <?php endforeach; ?>



        <!-- Nav Item - Charts -->
        <li class="nav-item">
           <a class="nav-link" data-toggle="modal" data-target="#logoutModal">
              <i class="fas fa-fw fa-sign-out-alt"></i>
              <span>Logout</span></a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider d-none d-md-block">

        <!-- Sidebar Toggler (Sidebar) -->
        <div class="text-center d-none d-md-inline">
           <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>

  </ul>
  <!-- End of Sidebar -->

  <div class="flash-data" data-flashdata="<?= $this->session->flashdata('pesan'); ?>"></div>
  <div class="error" data-error="<?= $this->session->flashdata('error'); ?>"></div>