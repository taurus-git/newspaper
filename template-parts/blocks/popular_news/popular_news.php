<?php
$popular_news = get_popular_news ();
?>

<!-- ##### Popular News Area Start ##### -->
<div class="popular-news-area section-padding-80-50">
    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-8">
                <div class="section-heading">
                    <h6>Popular News</h6>
                </div>
                <div class="row">
                    <?php echo $popular_news; ?>
                </div>
            </div>

            <?php get_sidebar('side'); ?>
        </div>
    </div>
</div>
<!-- ##### Popular News Area End ##### -->
