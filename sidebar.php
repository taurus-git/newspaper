<?php
if ( is_active_sidebar( 'info_side' ) ) : ?>

    <div id="true-side" class="sidebar">

        <?php dynamic_sidebar( 'info_side' ); ?>

    </div>

<?php endif; ?>