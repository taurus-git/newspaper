<?php
/**
 * Template name: Home
 */

get_header();

//Todo. Make get field with taxonomy list
$term = 'finance';

$first_news = get_first_news($term, 1);
$featured_post = get_featured_posts($term, 3);
?>
<?php while (have_posts()): the_post();?>
    <?php the_content();?>
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

                <div class="col-12 col-md-6 col-lg-4">
                    <!-- Single Featured Post -->
                    <div class="single-blog-post small-featured-post d-flex">
                        <div class="post-thumb">
                            <a href="#"><img src="img/bg-img/19.jpg" alt=""></a>
                        </div>
                        <div class="post-data">
                            <a href="#" class="post-catagory">Finance</a>
                            <div class="post-meta">
                                <a href="#" class="post-title">
                                    <h6>Pellentesque mattis arcu massa, nec fringilla turpis eleifend id.</h6>
                                </a>
                                <p class="post-date"><span>7:00 AM</span> | <span>April 14</span></p>
                            </div>
                        </div>
                    </div>

                    <!-- Single Featured Post -->
                    <div class="single-blog-post small-featured-post d-flex">
                        <div class="post-thumb">
                            <a href="#"><img src="img/bg-img/20.jpg" alt=""></a>
                        </div>
                        <div class="post-data">
                            <a href="#" class="post-catagory">Politics</a>
                            <div class="post-meta">
                                <a href="#" class="post-title">
                                    <h6>Sed a elit euismod augue semper congue sit amet ac sapien.</h6>
                                </a>
                                <p class="post-date"><span>7:00 AM</span> | <span>April 14</span></p>
                            </div>
                        </div>
                    </div>

                    <!-- Single Featured Post -->
                    <div class="single-blog-post small-featured-post d-flex">
                        <div class="post-thumb">
                            <a href="#"><img src="img/bg-img/21.jpg" alt=""></a>
                        </div>
                        <div class="post-data">
                            <a href="#" class="post-catagory">Health</a>
                            <div class="post-meta">
                                <a href="#" class="post-title">
                                    <h6>Pellentesque mattis arcu massa, nec fringilla turpis eleifend id.</h6>
                                </a>
                                <p class="post-date"><span>7:00 AM</span> | <span>April 14</span></p>
                            </div>
                        </div>
                    </div>

                    <!-- Single Featured Post -->
                    <div class="single-blog-post small-featured-post d-flex">
                        <div class="post-thumb">
                            <a href="#"><img src="img/bg-img/22.jpg" alt=""></a>
                        </div>
                        <div class="post-data">
                            <a href="#" class="post-catagory">Finance</a>
                            <div class="post-meta">
                                <a href="#" class="post-title">
                                    <h6>Augue semper congue sit amet ac sapien. Fusce consequat.</h6>
                                </a>
                                <p class="post-date"><span>7:00 AM</span> | <span>April 14</span></p>
                            </div>
                        </div>
                    </div>

                    <!-- Single Featured Post -->
                    <div class="single-blog-post small-featured-post d-flex">
                        <div class="post-thumb">
                            <a href="#"><img src="img/bg-img/23.jpg" alt=""></a>
                        </div>
                        <div class="post-data">
                            <a href="#" class="post-catagory">Travel</a>
                            <div class="post-meta">
                                <a href="#" class="post-title">
                                    <h6>Pellentesque mattis arcu massa, nec fringilla turpis eleifend id.</h6>
                                </a>
                                <p class="post-date"><span>7:00 AM</span> | <span>April 14</span></p>
                            </div>
                        </div>
                    </div>

                    <!-- Single Featured Post -->
                    <div class="single-blog-post small-featured-post d-flex">
                        <div class="post-thumb">
                            <a href="#"><img src="img/bg-img/24.jpg" alt=""></a>
                        </div>
                        <div class="post-data">
                            <a href="#" class="post-catagory">Politics</a>
                            <div class="post-meta">
                                <a href="#" class="post-title">
                                    <h6>Augue semper congue sit amet ac sapien. Fusce consequat.</h6>
                                </a>
                                <p class="post-date"><span>7:00 AM</span> | <span>April 14</span></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Featured Post Area End ##### -->

<?php endwhile; ?>

<?php get_sidebar(); ?>

<?php get_footer();
