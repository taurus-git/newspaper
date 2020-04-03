<?php
/**
 * Template name: Home
 */

get_header();

$featured_news = show_latest_news_from_category('finance', 3);
?>
<?php while (have_posts()): the_post();?>
    <?php the_content();?>

    <?php echo $featured_news;?>

<?php endwhile; ?>

<?php get_sidebar(); ?>

<?php get_footer();
