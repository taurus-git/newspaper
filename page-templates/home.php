<?php
/**
 * Template name: Home
 */

get_header();

$first_news = get_first_news('finance', 3);
$featured_post = get_featured_post('finance', 3);
?>
<?php while (have_posts()): the_post();?>
    <?php the_content();?>

    <?php echo $first_news;?>
    <?php echo $featured_post;?>

<?php endwhile; ?>

<?php get_sidebar(); ?>

<?php get_footer();
