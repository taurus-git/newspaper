<?php
/**
 * Template name: Home
 */

get_header();
function get_popular_news_from_category () {
    $news_from_category = get_field('popular_news_area');
    return $news_from_category;
}

function get_news_from_category_id ($news_from_category) {
    $category_id = $news_from_category->term_id;
    return $category_id;
}

function get_most_viewed_posts_ids () {
    $most_viewed_posts = newspaper_get_most_viewed("num=10 &echo=0 &return=array");
    foreach ($most_viewed_posts as $post) {
        $post_id = $post->ID;
        $most_viewed_posts_ids[] =$post_id;
    }
    return $most_viewed_posts_ids;
}

function get_most_viewed_posts_categories_ids ($most_viewed_posts_ids) {
    foreach ($most_viewed_posts_ids as $post_id) {
        $categories_ids[] = get_news_category_id($post_id);
    }
    return $categories_ids;
}

function get_popular_news_ids (   ) {
    $popular_news_from_category = get_popular_news_from_category ();
    $popular_news_category_id = get_news_from_category_id ($popular_news_from_category);

    $most_viewed_posts_ids = get_most_viewed_posts_ids ();
    $most_viewed_posts_categories_ids = get_most_viewed_posts_categories_ids ($most_viewed_posts_ids);

    if ( in_array($popular_news_category_id, $most_viewed_posts_categories_ids) ) {
        $result = '';
        foreach ($most_viewed_posts_ids as $post_id) {

            $result .= " -  " . $post_id . " - ";
        }

    }

    return $result;
}

$popular_news = get_popular_news_ids ();
var_dump($popular_news);


?>
<?php while (have_posts()): the_post();?>

    <?php the_content();?>

<?php endwhile; ?>

<?php get_sidebar(); ?>

<?php get_footer();
