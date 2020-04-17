<?php
/**
 * Template name: Home
 */

get_header();
$num_of_posts = 2;
$news_category_posts = newspaper_get_most_viewed("$num_of_posts &echo=0 &return=array");
//var_dump($news_category_posts);
?>
<?php while (have_posts()): the_post();?>

    <?php the_content();?>

<?php endwhile; ?>

<?php get_sidebar(); ?>

<?php get_footer();
