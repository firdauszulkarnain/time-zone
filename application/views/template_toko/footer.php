</main>
<footer>
    <!-- Footer Start-->
    <div class="footer-area footer-padding">
        <div class="container">
            <div class="row d-flex justify-content-between">
                <div class="col-xl-3 col-lg-3 col-md-5 col-sm-6">
                    <div class="single-footer-caption mb-50">
                        <div class="single-footer-caption mb-30">
                            <!-- logo -->
                            <div class="footer-logo">
                                <a href="index.html"><img src="<?= base_url(); ?>/assets/img/logo/logo2_footer.png" alt=""></a>
                            </div>
                            <div class="footer-tittle">
                                <div class="footer-pera">
                                    <p>Asorem ipsum adipolor sdit amet, consectetur adipisicing elitcf sed do eiusmod tem.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-2 col-lg-3 col-md-3 col-sm-5">
                    <div class="single-footer-caption mb-50">
                        <div class="footer-tittle">
                            <h4>Quick Links</h4>
                            <ul>
                                <li><a href="#">About</a></li>
                                <li><a href="#"> Discounts</a></li>
                                <li><a href="#"> Contact Us</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-5 col-sm-7">
                    <div class="single-footer-caption mb-50">
                        <div class="footer-tittle">
                            <h4>Support</h4>
                            <ul>
                                <li><a href="#">Frequently Asked Questions</a></li>
                                <li><a href="#">Terms & Conditions</a></li>
                                <li><a href="#">Privacy Policy</a></li>
                                <li><a href="#">Report a Payment Issue</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Footer bottom -->
            <div class="row align-items-center">
                <div class="col-xl-7 col-lg-8 col-md-7">
                    <div class="footer-copy-right">
                        <p>
                            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                            Copyright &copy;<script>
                                document.write(new Date().getFullYear());
                            </script> All rights reserved | TimeZone
                        </p>
                    </div>
                </div>
                <div class="col-xl-5 col-lg-4 col-md-5">
                    <div class="footer-copy-right f-right">
                        <!-- social -->
                        <div class="footer-social">
                            <a href="#"><i class="fab fa-twitter"></i></a>
                            <a href="https://www.facebook.com/sai4ull"><i class="fab fa-facebook-f"></i></a>
                            <a href="#"><i class="fab fa-behance"></i></a>
                            <a href="#"><i class="fas fa-globe"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End-->
</footer>
<!--? Search model Begin -->
<div class="search-model-box">
    <div class="h-100 d-flex align-items-center justify-content-center">
        <div class="search-close-btn">+</div>
        <form class="search-model-form">
            <input type="text" id="search-input" placeholder="Searching key.....">
        </form>
    </div>
</div>
<!-- Search model end -->


<!-- JS here -->

<script src="<?= base_url(); ?>/assets/js/vendor/modernizr-3.5.0.min.js"></script>
<!-- Jquery, Popper, Bootstrap -->
<script src="<?= base_url(); ?>/assets/js/vendor/jquery-1.12.4.min.js"></script>
<script src="<?= base_url(); ?>/assets/js/popper.min.js"></script>
<script src="<?= base_url(); ?>/assets/js/bootstrap.min.js"></script>
<!-- Jquery Mobile Menu -->
<script src="<?= base_url(); ?>/assets/js/jquery.slicknav.min.js"></script>

<!-- Jquery Slick , Owl-Carousel Plugins -->
<script src="<?= base_url(); ?>/assets/js/owl.carousel.min.js"></script>
<script src="<?= base_url(); ?>/assets/js/slick.min.js"></script>

<!-- One Page, Animated-HeadLin -->
<script src="<?= base_url(); ?>/assets/js/wow.min.js"></script>
<script src="<?= base_url(); ?>/assets/js/animated.headline.js"></script>
<script src="<?= base_url(); ?>/assets/js/jquery.magnific-popup.js"></script>

<!-- Scrollup, nice-select, sticky -->
<script src="<?= base_url(); ?>/assets/js/jquery.scrollUp.min.js"></script>
<script src="<?= base_url(); ?>/assets/js/jquery.nice-select.min.js"></script>
<script src="<?= base_url(); ?>/assets/js/jquery.sticky.js"></script>

<!-- contact js -->
<script src="<?= base_url(); ?>/assets/js/contact.js"></script>
<script src="<?= base_url(); ?>/assets/js/jquery.form.js"></script>
<script src="<?= base_url(); ?>/assets/js/jquery.validate.min.js"></script>
<script src="<?= base_url(); ?>/assets/js/mail-script.js"></script>
<script src="<?= base_url(); ?>/assets/js/jquery.ajaxchimp.min.js"></script>

<!-- Jquery Plugins, main Jquery -->
<script src="<?= base_url(); ?>/assets/js/plugins.js"></script>
<script src="<?= base_url(); ?>/assets/js/main.js"></script>
<!-- SELECT PICKER -->
<script src="<?= base_url() ?>assets/js/bootstrap-select.js"></script>
<script src="<?= base_url('assets/js/select/defaults-id_ID.min.js') ?>"></script>

<script>
    $('.custom-file-input').on('change', function() {
        let fileName = $(this).val().split('\\').pop();
        $(this).next('.custom-file-label').addClass("selected").html(fileName);
    });
</script>
</body>

</html>