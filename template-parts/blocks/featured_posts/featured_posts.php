<?php
$term = get_field('news_taxonomy');
$term_slug = $term->slug;
$first_news = get_first_news($term_slug, 1);
$featured_post = get_featured_posts($term_slug, 3);
$small_single_post = get_small_single_post ();

?>
<!-- ##### Featured Post Area Start ##### -->
    <div class="featured-post-area">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-6 col-lg-8">
                    <div class="row">
                        <?php echo $first_news;?>
                        <?php echo $featured_post;?>
                    </div>
                </div>

                <?php echo $small_single_post; ?>
            </div>
        </div>
    </div>
    <!-- ##### Featured Post Area End ##### -->