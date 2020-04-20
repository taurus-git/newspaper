<?php
if ( is_active_sidebar( 'info_side' ) ) : ?>

    <div class="col-12 col-lg-4">
        <div class="section-heading">
            <h6>Info</h6>
        </div>
        <?php dynamic_sidebar( 'info_side' ); ?>
    </div>

<?php endif; ?>