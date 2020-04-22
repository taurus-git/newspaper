<?php

function newspaper_register_news() {

    /**
     * Post Type: News.
     */

    $labels = array(
        "name" => "News",
        "singular_name" => "News",
        'add_new' => 'Add New'
    );

    $args = array(
        "label" => "News",
        "labels" => $labels,
        "description" => "",
        "public" => true,
        "publicly_queryable" => true,
        "show_ui" => true,
        "show_in_rest" => true,
        "rest_base" => "",
        "has_archive" => false,
        "show_in_menu" => true,
        "exclude_from_search" => false,
        "capability_type" => "post",
        "map_meta_cap" => true,
        "hierarchical" => false,
        "rewrite" => array( 'slug' => 'news_category', "with_front" => false ),
        "query_var" => true,
        "supports" => array( "title", "editor", "thumbnail", "excerpt", "revisions", "author", "comments"),
        'menu_icon'   => 'dashicons-format-aside',
    );

    register_post_type( "news", $args );
}

add_action( 'init', 'newspaper_register_news' );

function newspaper_register_news_category() {

    /**
     * Taxonomy: News Categories.
     */

    $labels = array(
        "name" => "News Categories",
        "singular_name" => "Category",
    );

    $args = array(
        "label" => "News Categories",
        "labels" => $labels,
        "public" => true,
        "hierarchical" => true,
        "show_ui" => true,
        "show_in_menu" => true,
        "show_in_nav_menus" => true,
        "query_var" => true,
        "rewrite" => array( 'slug' => 'news_category', 'with_front' => false, ),
        "show_admin_column" => 1,
        "show_in_rest" => true,
        "rest_base" => "",
        "show_in_quick_edit" => true,
    );
    register_taxonomy( "news_category", array( "news" ), $args );
}

add_action( 'init', 'newspaper_register_news_category' );


if( function_exists('acf_add_local_field_group') ):

    acf_add_local_field_group(array(
        'key' => 'group_5e776264706aa',
        'title' => 'Hero area',
        'fields' => array(
            array(
                'key' => 'field_5e77627df5378',
                'label' => 'Breaking news',
                'name' => 'breaking_news',
                'type' => 'repeater',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '50',
                    'class' => '',
                    'id' => '',
                ),
                'collapsed' => '',
                'min' => 0,
                'max' => 0,
                'layout' => 'table',
                'button_label' => '',
                'sub_fields' => array(
                    array(
                        'key' => 'field_5e7762b3f5379',
                        'label' => 'Breaking news list',
                        'name' => 'breaking_news_list',
                        'type' => 'post_object',
                        'instructions' => '',
                        'required' => 0,
                        'conditional_logic' => 0,
                        'wrapper' => array(
                            'width' => '',
                            'class' => '',
                            'id' => '',
                        ),
                        'post_type' => array(
                            0 => 'news',
                        ),
                        'taxonomy' => '',
                        'allow_null' => 0,
                        'multiple' => 0,
                        'return_format' => 'object',
                        'ui' => 1,
                    ),
                ),
            ),
            array(
                'key' => 'field_5e77631cf537a',
                'label' => 'International news',
                'name' => 'international_news',
                'type' => 'repeater',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '50',
                    'class' => '',
                    'id' => '',
                ),
                'collapsed' => '',
                'min' => 0,
                'max' => 0,
                'layout' => 'table',
                'button_label' => '',
                'sub_fields' => array(
                    array(
                        'key' => 'field_5e77633ff537b',
                        'label' => 'International news list',
                        'name' => 'international_news_list',
                        'type' => 'post_object',
                        'instructions' => '',
                        'required' => 0,
                        'conditional_logic' => 0,
                        'wrapper' => array(
                            'width' => '',
                            'class' => '',
                            'id' => '',
                        ),
                        'post_type' => array(
                            0 => 'news',
                        ),
                        'taxonomy' => '',
                        'allow_null' => 0,
                        'multiple' => 0,
                        'return_format' => 'object',
                        'ui' => 1,
                    ),
                ),
            ),
            array(
                'key' => 'field_5e7c7338bb973',
                'label' => 'Hero area banner field',
                'name' => 'hero_area_banner_field',
                'type' => 'file',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'return_format' => 'array',
                'library' => 'all',
                'min_size' => '',
                'max_size' => '',
                'mime_types' => '',
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'block',
                    'operator' => '==',
                    'value' => 'acf/heroarea',
                ),
            ),
        ),
        'menu_order' => 0,
        'position' => 'normal',
        'style' => 'default',
        'label_placement' => 'top',
        'instruction_placement' => 'label',
        'hide_on_screen' => '',
        'active' => true,
        'description' => '',
    ));

    acf_add_local_field_group(array(
        'key' => 'group_5e8d9bfe80ce6',
        'title' => 'News category',
        'fields' => array(
            array(
                'key' => 'field_5e8d9cb6deee6',
                'label' => 'Category',
                'name' => 'news_taxonomy',
                'type' => 'taxonomy',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'taxonomy' => 'news_category',
                'field_type' => 'select',
                'allow_null' => 1,
                'add_term' => 1,
                'save_terms' => 0,
                'load_terms' => 0,
                'return_format' => 'object',
                'multiple' => 0,
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'block',
                    'operator' => '==',
                    'value' => 'acf/featuredposts',
                ),
            ),
        ),
        'menu_order' => 0,
        'position' => 'normal',
        'style' => 'default',
        'label_placement' => 'top',
        'instruction_placement' => 'label',
        'hide_on_screen' => '',
        'active' => true,
        'description' => '',
    ));

    acf_add_local_field_group(array(
        'key' => 'group_5e8dcdf68692d',
        'title' => 'News list',
        'fields' => array(
            array(
                'key' => 'field_5e8dce4776796',
                'label' => 'News list',
                'name' => 'news_list',
                'type' => 'repeater',
                'instructions' => 'Choose News category and news',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'collapsed' => '',
                'min' => 0,
                'max' => 0,
                'layout' => 'table',
                'button_label' => '',
                'sub_fields' => array(
                    array(
                        'key' => 'field_5e8dd0fab9355',
                        'label' => 'Single news',
                        'name' => 'single_news',
                        'type' => 'relationship',
                        'instructions' => '',
                        'required' => 0,
                        'conditional_logic' => 0,
                        'wrapper' => array(
                            'width' => '',
                            'class' => '',
                            'id' => '',
                        ),
                        'post_type' => array(
                            0 => 'news',
                        ),
                        'taxonomy' => '',
                        'filters' => array(
                            0 => 'search',
                            1 => 'taxonomy',
                        ),
                        'elements' => '',
                        'min' => 1,
                        'max' => 1,
                        'return_format' => 'object',
                    ),
                ),
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'block',
                    'operator' => '==',
                    'value' => 'acf/featuredposts',
                ),
            ),
        ),
        'menu_order' => 0,
        'position' => 'normal',
        'style' => 'default',
        'label_placement' => 'top',
        'instruction_placement' => 'label',
        'hide_on_screen' => '',
        'active' => true,
        'description' => '',
    ));

    acf_add_local_field_group(array(
        'key' => 'group_5e94320a60f63',
        'title' => 'Popular news',
        'fields' => array(
            array(
                'key' => 'field_5e94321f727a1',
                'label' => 'Popular news area',
                'name' => 'popular_news_area',
                'type' => 'taxonomy',
                'instructions' => 'Choose Category for showing popular news from it',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'taxonomy' => 'news_category',
                'field_type' => 'select',
                'allow_null' => 1,
                'add_term' => 1,
                'save_terms' => 0,
                'load_terms' => 0,
                'return_format' => 'object',
                'multiple' => 0,
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'block',
                    'operator' => '==',
                    'value' => 'acf/popularnews',
                ),
            ),
        ),
        'menu_order' => 0,
        'position' => 'normal',
        'style' => 'default',
        'label_placement' => 'top',
        'instruction_placement' => 'label',
        'hide_on_screen' => '',
        'active' => true,
        'description' => '',
    ));

    acf_add_local_field_group(array(
        'key' => 'group_5e9e939641194',
        'title' => 'Video post area',
        'fields' => array(
            array(
                'key' => 'field_5e9e93af27a28',
                'label' => 'Background image',
                'name' => 'video-post-area_background_image',
                'type' => 'image',
                'instructions' => 'Add image here for setting video post area background',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'return_format' => 'array',
                'preview_size' => 'medium',
                'library' => 'all',
                'min_width' => '',
                'min_height' => '',
                'min_size' => '',
                'max_width' => '',
                'max_height' => '',
                'max_size' => '',
                'mime_types' => '',
            ),
            array(
                'key' => 'field_5e9e98816cd63',
                'label' => 'Video items',
                'name' => 'video_items',
                'type' => 'repeater',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'collapsed' => '',
                'min' => 0,
                'max' => 3,
                'layout' => 'table',
                'button_label' => 'Add video',
                'sub_fields' => array(
                    array(
                        'key' => 'field_5e9e98c26cd64',
                        'label' => 'Video',
                        'name' => 'video',
                        'type' => 'text',
                        'instructions' => 'Paste link to video from YouTube here',
                        'required' => 0,
                        'conditional_logic' => 0,
                        'wrapper' => array(
                            'width' => '',
                            'class' => '',
                            'id' => '',
                        ),
                        'default_value' => '',
                        'placeholder' => '',
                        'prepend' => '',
                        'append' => '',
                        'maxlength' => '',
                    ),
                ),
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'block',
                    'operator' => '==',
                    'value' => 'acf/videoposts',
                ),
            ),
        ),
        'menu_order' => 0,
        'position' => 'normal',
        'style' => 'default',
        'label_placement' => 'top',
        'instruction_placement' => 'label',
        'hide_on_screen' => '',
        'active' => true,
        'description' => '',
    ));
endif;

add_action('acf/init', 'newspaper_acf_blocks_init');
function newspaper_acf_blocks_init() {

    if( function_exists('acf_register_block_type') ) {

        acf_register_block_type(array(
            'name'              => 'heroarea',
            'title'             => __('Hero area'),
            'description'       => __('A custom Hero area block.'),
            'render_template'   => 'template-parts/blocks/hero_area/hero_area.php',
            'category'          => 'formatting',
        ));

        acf_register_block_type(array(
            'name'              => 'featuredposts',
            'title'             => __('Featured posts area'),
            'description'       => __('A custom Featured posts block.'),
            'render_template'   => 'template-parts/blocks/featured_posts/featured_posts.php',
            'category'          => 'formatting',
        ));

        acf_register_block_type(array(
            'name'              => 'popularnews',
            'title'             => __('Popular news area'),
            'description'       => __('A custom Popular News block.'),
            'render_template'   => 'template-parts/blocks/popular_news/popular_news.php',
            'category'          => 'formatting',
        ));
        acf_register_block_type(array(
            'name'              => 'videoposts',
            'title'             => __('Video Posts area'),
            'description'       => __('A custom Video Posts block.'),
            'render_template'   => 'template-parts/blocks/video_posts/video_posts.php',
            'category'          => 'formatting',
        ));

    }
}
/*Start Hero Area*/
function get_hero_area () {
    $latest_news = get_latest_news ();
    $hero_area_banner = get_hero_area_banner ();

    ob_start();?>
    <div class="hero-area">
        <div class="container">
            <div class="row align-items-center">
                <?php echo $latest_news; ?>
                <?php echo $hero_area_banner; ?>
            </div>
        </div>
    </div>
    <?php
    return ob_get_clean();
}

function get_latest_news (){
    $breaking_news = get_breaking_news();
    $international_news = get_international_news();

    if (!$breaking_news && !$international_news) return;

    ob_start();?>
    <div class="col-12 col-lg-8">

        <?php if($breaking_news): echo $breaking_news;?>
        <?php endif;?>

        <?php if($international_news): echo $international_news;?>
        <?php endif;?>

    </div>
    <?php
    return ob_get_clean();

}

function get_breaking_news () {
    $breaking_news = get_field('breaking_news');
    if (empty($breaking_news)) return;

    ob_start(); ?>
    <!-- Breaking News Widget -->
    <div class="breaking-news-area d-flex align-items-center">
        <div class="news-title">
            <p>Breaking News</p>
        </div>
        <div id="breakingNewsTicker" class="ticker">
            <ul>
                <?php
                foreach ($breaking_news as $news) {
                    $link = get_post_permalink($news["breaking_news_list"]->ID);
                    $title = $news["breaking_news_list"]->post_title;
                    ?>
                    <li>
                        <a href="<?php echo $link; ?>">
                            <?php echo $title; ?>
                        </a>
                    </li>
                    <?php
                }?>
            </ul>
        </div>
    </div>
    <?php
    return ob_get_clean();
}

function get_international_news () {
    $international_news = get_field('international_news');
    if( empty($international_news) ) return;

    ob_start();?>
    <!-- Breaking News Widget -->
    <div class="breaking-news-area d-flex align-items-center mt-15">
        <div class="news-title title2">
            <p>International</p>
        </div>
        <div id="internationalTicker" class="ticker">
            <ul>
                <?php
                foreach ($international_news as $news) { ?>
                    <li>
                        <a href="<?php echo get_post_permalink($news["international_news_list"]->ID); ?>">
                            <?php echo $news["international_news_list"]->post_title; ?>
                        </a>
                    </li>
                    <?php
                }?>
            </ul>
        </div>
    </div>
    <?php
    return ob_get_clean();
}

function get_hero_area_banner () {
    $hero_area_banner = get_field('hero_area_banner_field');
    if( empty($hero_area_banner) ) return;

    ob_start();?>
    <div class="col-12 col-lg-4">
        <div class="hero-add">
            <a href="#">
                <img src="<?php echo $hero_area_banner['url'];?>"
                     alt="<?php echo $hero_area_banner['alt'];?>">
            </a>
        </div>
    </div>
    <?php
    return ob_get_clean();
}
/*End Hero Area*/

/*Start Featured Post Area*/
function get_first_news($term_slug, $num_of_post) {
    $news_by_term = get_news_by_term($term_slug, $num_of_post);

    if ( count($news_by_term) >= 1 ) {
        $first_news = array_slice($news_by_term, 0, 1);
        $first_news_id = $first_news[0]->ID;
        $markup_params = get_first_news_markup_params($first_news_id);
        $first_news_markup = get_first_news_markup($first_news_id, $markup_params);

        return $first_news_markup;
    }
}

function get_first_news_markup($id, $markup_params) {
    $class = $markup_params['class'];
    $image_size = $markup_params['image_size'];
    $thumb = get_the_post_thumbnail( $id, $image_size );
    $permalink = get_post_permalink( $id );
    $show_taxonomy_name = $markup_params['show_taxonomy_name'];
    if ($show_taxonomy_name){
        $taxonomy = get_the_terms( $id, 'news_category' );

        if( !empty($taxonomy) ){
            $term = array_shift( $taxonomy );
            $term_name = get_taxonomy_name ($term);
            $term_link = get_taxonomy_link ($term);
        }
    }
    $title = esc_html( get_the_title($id) );
    $show_author = $markup_params['show_author'];
    if ($show_author) {
        $author_id = get_author_id ($id);
        $author_name = get_author_full_name ($author_id);
    }
    $description = get_the_excerpt($id);
    $show_post_comments = $markup_params['show_post_comments'];
    $show_date = $markup_params['show_date'];

    ob_start();
    ?>
    <!-- Single Featured Post -->
    <div class="col-12 col-lg-7">
        <div class="<?php echo $class; ?>">
            <div class="post-thumb">
                <a href="<?php echo $permalink; ?>">
                    <?php echo $thumb; ?>
                </a>
            </div>
            <div class="post-data">
                <a href="<?php echo $term_link; ?>" class="post-catagory">
                    <?php echo $term_name; ?>
                </a>
                <a href="<?php echo $permalink; ?>" class="post-title">
                    <h6><?php echo $title; ?></h6>
                </a>
                <div class="post-meta">
                    <?php echo sprintf('<p class="post-author">%s<a href="#">%s</a></p>', 'By ', $author_name);?>
                    <p class="post-excerp"><?php echo $description;?></p>
                    <?php if($show_post_comments): ?>
                        <!-- Post Like & Post Comment -->
                        <div class="d-flex align-items-center">
                            <a href="#" class="post-like"><img src="img/core-img/like.png" alt=""> <span>392</span></a>
                            <a href="#" class="post-comment"><img src="img/core-img/chat.png" alt=""> <span>10</span></a>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
    <?php
    return ob_get_clean();
}

function get_first_news_markup_params($id) {
    $params = array(
        'class' => 'single-blog-post featured-post',
        'image_size' => 'single_featured_post',
        'show_taxonomy_name' => true,
        'show_author' => true,
        'show_post_comments' => true,
        'show_date' => false,
    );
    return $params;
}

function get_featured_posts ($term_slug, $num_of_post) {
    $first_news = get_first_news($term_slug, 3);

    if ( !empty($first_news) ) {
        $all_news_by_term = get_news_by_term($term_slug, $num_of_post);
        $news_by_term = array_slice($all_news_by_term, 1);

        if ( count($news_by_term) >= 1 ) {
            $output = '';

            foreach ($news_by_term as $single_news) {
                $id = $single_news->ID;
                $markup_params = get_featured_posts_markup_params($id);
                $markup = get_news_markup($id, $markup_params);
                $output .= $markup;
            }
        }

        if (!$output) return;
        return '<div class="col-12 col-lg-5">' . $output . '</div>';
    }
}

function get_news_markup($id, $markup_params) {
    $class = $markup_params['class'];
    $image_size = $markup_params['image_size'];
    $thumb = get_the_post_thumbnail( $id, $image_size );
    $permalink = get_post_permalink( $id );
    $show_taxonomy_name = $markup_params['show_taxonomy_name'];
    if ($show_taxonomy_name){
        $taxonomy = get_the_terms( $id, 'news_category' );

        if( !empty($taxonomy) ){
            $term = array_shift( $taxonomy );
            $term_name = get_taxonomy_name ($term);
            $term_link = get_taxonomy_link ($term);
        }
    }
    $title = esc_html( get_the_title($id) );
    $show_author = $markup_params['show_author'];
    if ($show_author) {
        $author_id = get_author_id ($id);
        $author_name = get_author_full_name ($author_id);
    }

    $post = get_post($id);
    $description = $post->post_content;
    $description = excerpt(21, $id);

    $show_post_comments = $markup_params['show_post_comments'];
    $show_date = $markup_params['show_date'];

    ob_start();?>

    <div class="<?php echo $class; ?>">
        <div class="post-thumb">
            <a href="<?php echo $permalink; ?>">
                <?php echo $thumb; ?>
            </a>
        </div>
        <div class="post-data">
            <a href="<?php echo $term_link; ?>" class="post-catagory">
                <?php echo $term_name; ?>
            </a>
            <div class="post-meta">
                <a href="<?php echo $permalink; ?>" class="post-title">
                    <h6><?php echo $description; ?></h6>
                </a>
                <?php if($show_post_comments): ?>
                    <!-- Post Like & Post Comment -->
                    <div class="d-flex align-items-center">
                        <a href="#" class="post-like"><img src="img/core-img/like.png" alt=""> <span>392</span></a>
                        <a href="#" class="post-comment"><img src="img/core-img/chat.png" alt=""> <span>10</span></a>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <?php
    return ob_get_clean();
}

function get_featured_posts_markup_params($id) {
    $params = array(
        'class' => 'single-blog-post featured-post-2',
        'image_size' => 'single_featured_post_2',
        'show_taxonomy_name' => true,
        'show_author' => false,
        'show_post_comments' => true,
        'show_date' => false,
    );
    return $params;
}


function get_news_by_term($term_slug, $num_of_posts) {
    if (!$term_slug) return;

    $args = array(
        'post_type' => 'news',
        'posts_per_page' => $num_of_posts,
        'post_status' => 'publish',
        'orderby' => 'date',
        'tax_query' => array(
            array(
                'taxonomy' => 'news_category',
                'field'    => 'slug',
                'terms'    => array( $term_slug ),
            )
        )
    );

    $news = get_posts($args);
    return $news;
}


function get_small_single_post () {
    $news_list = get_field('news_list');
    $output = '';
    foreach ($news_list as $news) {
        $single_news = $news["single_news"][0];
        $id = $single_news->ID;
        $markup_params = get_small_single_post_markup_params($id);
        $markup = get_small_single_post_markup ($news, $markup_params);
        $output .= $markup;
    }

    if (!$output) return;
    return '<div class="col-12 col-md-6 col-lg-4">' . $output . '</div>';
}

function get_small_single_post_markup ($news, $markup_params) {
    $single_news = $news["single_news"][0];

    $id = $single_news->ID;
    $link = get_post_permalink($id);
    $title = $single_news->post_title;
    $image_size = $markup_params['image_size'];
    $thumb = get_the_post_thumbnail( $id, $image_size );
    $show_taxonomy_name = $markup_params['show_taxonomy_name'];
    if ($show_taxonomy_name) {
        $taxonomy = get_the_terms( $id, 'news_category' );

        if( !empty($taxonomy) ){
            $term = array_shift( $taxonomy );
            $term_name = get_taxonomy_name ($term);
            $term_link = get_taxonomy_link ($term);
        }    
    }   
    $show_date = $markup_params['show_date'];
    $time = get_time();
    $date_format = 'F j';
    $date = get_date($date_format);

    ob_start();?>
    <!-- Single Featured Post -->
        <div class="single-blog-post small-featured-post d-flex">
            <div class="post-thumb">
                <a href="<?php echo $link; ?>">
                    <?php echo $thumb; ?>
                </a>
            </div>
            <div class="post-data">
                <a href="<?php echo $term_link; ?>" class="post-catagory"><?php echo $term_name; ?></a>
                <div class="post-meta">
                    <a href="<?php echo $link; ?>" class="post-title">
                        <h6><?php echo $title; ?></h6>
                    </a>
                    <?php if($show_date): ?>
                        <p class="post-date"><span><?php echo $time; ?></span> | <span><?php echo $date; ?></span>
                    <?php endif;?>
                </div>
            </div>
        </div>

    <?php
    return ob_get_clean();
}

function get_small_single_post_markup_params($id) {
    $params = array(
        'image_size' => 'small_featured_post',
        'show_taxonomy_name' => true,
        'show_date' => true,
    );
    return $params;
}
/*End Featured Post Area*/

/*Popular News area start*/
function get_popular_news ( ) {
    $popular_news_from_category = get_popular_news_from_category ();
    $popular_news_category_id = get_news_from_category_id ($popular_news_from_category);
    $markup_params = get_popular_news_markup_params();

    $most_viewed_posts = get_most_viewed_posts ();
    $output = '';

    foreach ($most_viewed_posts as $post) {
        $post_id = $post->ID;
        $taxonomy_id = get_news_category_id ($post_id);

        if ( $popular_news_category_id == $taxonomy_id ) {
                $markup = get_news_markup($post_id, $markup_params);
                $output .= '<div class="col-12 col-md-6">' . $markup  . '</div>';
            }

        }

    if (!$output) return;
    return $output;
}

function get_popular_news_markup_params() {
    $params = array(
        'class' => 'single-blog-post style-3',
        'image_size' => 'single_blog_post',
        'show_taxonomy_name' => true,
        'show_author' => false,
        'show_post_comments' => true,
        'show_date' => false,
    );
    return $params;
}
/*Popular News area end*/

/*Video Post Area Start*/
function url_exists( $url ) {
    $headers = get_headers($url);
    return stripos( $headers[0], "200 OK" ) ? true : false;
}

function get_youtube_id( $url ) {
    $youtubeid = explode('v=', $url);
    $youtubeid = explode('&', $youtubeid[1]);
    $youtubeid = $youtubeid[0];
    return $youtubeid;
}

function get_youtube_thumb( $id ) {
    if ( url_exists( 'https://i.ytimg.com/vi_webp/' .$id . '/maxresdefault.webp' ) ) {
        $image = 'https://i.ytimg.com/vi_webp/' .$id . '/maxresdefault.webp';
    }
    elseif ( url_exists( 'https://i.ytimg.com/vi_webp/' .$id . '/mqdefault.webp' ) ) {
        $image = 'https://i.ytimg.com/vi_webp/' .$id . '/mqdefault.webp';
    }
    elseif ( url_exists( 'https://i.ytimg.com/vi/' .$id . '/maxresdefault.jpg' ) ) {
        $image = 'https://i.ytimg.com/vi/' .$id . '/maxresdefault.jpg';
    }
    elseif ( url_exists( 'https://i.ytimg.com/vi/' .$id . '/mqdefault.jpg' ) ) {
        $image = 'https://i.ytimg.com/vi/' .$id . '/mqdefault.jpg';
    }
    else {
        $image = false;
    }
    return $image;
}

function get_videos_posts () {
    $videos = get_field('video_items');
    if (empty($videos)) return;

    $output ='';
    $args = array();
    foreach ($videos as $video) {
        $youtube_url = $video['video'];
        $id = get_youtube_id($youtube_url);
        $thumb = get_youtube_thumb($id);
        $args[$youtube_url] = $thumb;
    }

    $output = get_videos_posts_markup ($args);
    return $output;
}

function get_videos_posts_markup ($args) {
    if (empty($args)) return;

    $output = '';
    foreach ($args as $youtube_url => $thumb) {
        $output .= sprintf(
            '<div class="col-12 col-sm-6 col-md-4">
            <div class="single-video-post">
                <img src="%s" alt="">1
                <div class="videobtn">
                    <a href="%s" class="videoPlayer"><i class="fa fa-play" aria-hidden="true"></i></a>
                </div>
            </div>
        </div>', $thumb,  $youtube_url );
    }
    return $output;
}

/*Video Post Area End*/