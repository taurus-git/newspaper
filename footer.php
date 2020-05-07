

<!-- ##### Footer Area Start ##### -->
<footer class="footer-area">

    <!-- Main Footer Area -->
    <div class="main-footer-area">
        <div class="container">
            <div class="row">
                <!-- Footer Widget Area -->
                <div class="col-12 col-sm-6 col-lg-4">
                    <div class="footer-widget-area mt-80">
                        <!-- Footer Logo -->
                        <div class="footer-logo">
                            <a href="<?php echo get_home_url(null, '/');?>">
                                <img src="<?php bloginfo('template_url');?>/assets/img/core-img/logo.png" alt="">
                            </a>
                        </div>
                        <!-- List -->
                        <ul class="list">
                            <li><a href="mailto:contact@youremail.com">contact@youremail.com</a></li>
                            <li><a href="tel:+4352782883884">+43 5278 2883 884</a></li>
                            <li><a href="http://yoursitename.com">www.yoursitename.com</a></li>
                        </ul>
                    </div>
                </div>

                <?php get_sidebar('footer'); ?>

            </div>
        </div>
    </div>

<!-- Bottom Footer Area -->
<div class="bottom-footer-area">
    <div class="container h-100">
        <div class="row h-100 align-items-center">
            <div class="col-12">
                <!-- Copywrite -->
                <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
            </div>
        </div>
    </div>
</div>
</footer>
<!-- ##### Footer Area Start ##### -->
<?php wp_footer(); ?>
</body>
</html>
