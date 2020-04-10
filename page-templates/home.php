<?php
/**
 * Template name: Home
 */

get_header();

?>
<?php while (have_posts()): the_post();?>

    <?php the_content();?>
    <ul>
        <?php $most_viewed_posts = kama_get_most_viewed("num=10 &echo=0 &return=array"); ?>
        <?php var_dump( $most_viewed_posts );?>
    </ul>
<?php endwhile; ?>

<?php get_sidebar(); ?>

<?php get_footer();
