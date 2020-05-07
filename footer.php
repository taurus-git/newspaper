<?php
$footer_logo = get_field('footer_logo', 'options');
$footer_logo_url = $footer_logo['url'];
$footer_logo_alt = $footer_logo['alt'];
?>
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
                        <?php if (!empty($footer_logo)):?>
                            <div class="footer-logo">
                                <a href="<?php echo get_home_url(null, '/');?>">
                                    <img src="<?php echo $footer_logo_url; ?>" alt="<?php echo $footer_logo_alt; ?>">
                                </a>
                            </div>
                        <?php endif; ?>
                        <!-- List -->
                        <?php if (have_rows('contacts','option')): ?>
                            <ul class="list">
                                <?php while (have_rows('contacts','option')) : the_row();
                                    $contact = get_sub_field('contact','option');
                                    $link = get_sub_field('link','option');
                                    ?>
                                    <li>
                                        <a href="<?php echo $link; ?>">
                                            <?php echo $contact;?>
                                        </a>
                                    </li>
                                <?php endwhile;?>
                            </ul>
                        <?php endif;?>
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
