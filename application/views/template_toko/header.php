<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title><?= $judul; ?></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="manifest" href="site.webmanifest">
    <link rel="shortcut icon" type="image/x-icon" href="<?= base_url(); ?>/assets/img/favicon.ico">

    <!-- CSS here -->
    <link rel="stylesheet" href="<?= base_url(); ?>/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url(); ?>/assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="<?= base_url(); ?>/assets/css/flaticon.css">
    <link rel="stylesheet" href="<?= base_url(); ?>/assets/css/slicknav.css">
    <link rel="stylesheet" href="<?= base_url(); ?>/assets/css/animate.min.css">
    <link rel="stylesheet" href="<?= base_url(); ?>/assets/css/magnific-popup.css">
    <link rel="stylesheet" href="<?= base_url(); ?>/assets/css/fontawesome-all.min.css">
    <link rel="stylesheet" href="<?= base_url(); ?>/assets/css/themify-icons.css">
    <link rel="stylesheet" href="<?= base_url(); ?>/assets/css/slick.css">
    <link rel="stylesheet" href="<?= base_url(); ?>/assets/css/nice-select.css">
    <link rel="stylesheet" href="<?= base_url(); ?>/assets/css/style.css">
    <!-- SELECT -->
    <link rel="stylesheet" href="<?= base_url('assets/css/bootstrap-select.css') ?>">
</head>

<body>

    <!--? Preloader Start -->
    <div id="preloader-active">
        <div class="preloader d-flex align-items-center justify-content-center">
            <div class="preloader-inner position-relative">
                <div class="preloader-circle"></div>
                <div class="preloader-img pere-text">
                    <img src="<?= base_url(); ?>/assets/img/logo/logo.png" alt="">
                </div>
            </div>
        </div>
    </div>
    <!-- Preloader Start -->

    <header>
        <!-- Header Start -->
        <div class="header-area">
            <div class="main-header header-sticky">
                <div class="container-fluid">
                    <div class="menu-wrapper">
                        <!-- Logo -->
                        <div class="logo">
                            <a href="index.html"><img src="<?= base_url(); ?>/assets/img/logo/logo.png" alt=""></a>
                        </div>
                        <!-- Main-menu -->
                        <div class="main-menu d-none d-lg-block">
                            <nav>
                                <ul id="navigation">
                                    <li><a href="<?= base_url('customer'); ?>">Home</a></li>
                                    <li><a href="<?= base_url('customer/shop'); ?>">shop</a></li>
                                    <li><a href="<?= base_url('customer/aboutus'); ?>">about</a></li>
                                    <li><a href="<?= base_url('customer/contact'); ?>">Contact</a></li>
                                </ul>
                            </nav>
                        </div>
                        <!-- Header Right -->
                        <div class="header-right">
                            <?php if ($this->session->userdata('email')) : ?>
                                <ul>
                                    <li>
                                        <a type="button" id="dropdownMenuButton" data-toggle="dropdown">
                                            <span class="flaticon-user"></span>
                                        </a>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                            <a class="dropdown-item" href="<?= base_url('customer/customer_profile'); ?>">My Profile</a>
                                            <a class="dropdown-item" href="<?= base_url('customer/pesanan_customer'); ?>">Pesanan Saya</a>
                                            <a class="dropdown-item" href="<?= base_url('auth/logout'); ?>">Logout</a>
                                        </div>
                                    </li>
                                    <li>
                                        <a href="<?= base_url('customer/keranjang'); ?>"><span class="flaticon-shopping-cart"></span></a>
                                    </li>
                                </ul>
                            <?php else : ?>
                                <ul>
                                    <li> <a href="<?= base_url('auth'); ?>"><span class="flaticon-user"></span></a></li>

                                </ul>
                            <?php endif; ?>
                        </div>
                    </div>
                    <!-- Mobile Menu -->
                    <div class="col-12">
                        <div class="mobile_menu d-block d-lg-none"></div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Header End -->
    </header>