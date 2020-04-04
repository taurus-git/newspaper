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
    }
}

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
                foreach ($breaking_news as $news) { ?>
                    <li>
                        <a href="<?php echo get_post_permalink($news["breaking_news_list"]->ID); ?>">
                            <?php echo $news["breaking_news_list"]->post_title; ?>
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



function get_news_by_term($term, $num_of_posts) {
    if (!$term) return;

    $args = array(
        'post_type' => 'news',
        'posts_per_page' => $num_of_posts,
        'post_status' => 'publish',
        'orderby' => 'date',
        'tax_query' => array(
            array(
                'taxonomy' => 'news_category',
                'field'    => 'slug',
                'terms'    => array( $term ),
            )
        )
    );

    $news = get_posts($args);
    return $news;
}

function show_latest_news_from_category($term, $num_of_posts) {
    $news_by_term = get_news_by_term($term, $num_of_posts);

    if ( count($news_by_term) >= 2 ) {
        $first_news = array_shift($news_by_term);
        $first_news_id = $first_news->ID;
        $fist_news_markup = get_news_markup($first_news_id);

        $output = '';
        foreach ($news_by_term as $single_news) {
            $link = get_the_permalink($single_news->ID);
            $title = $single_news->post_title;

            $output .= sprintf('<li><a href="%s">%s</a></li>', $link, $title);
        }

        if (!$output) return;
        return '<ul>' . $output . '</ul>';
    }
}

function get_news_markup($id) {
    $first_news_markup_params = get_first_news_markup_params($id);

    var_dump($first_news_markup_params['class']);
}

function get_first_news_markup_params($id) {
    $params = array(
        'id' => $id,
        'class' => 'single-blog-post featured-post',
        'image_size' => '',
        'show_taxonomy_mame' => true,
        'show_author' => true,
        'show_post_comments' => true,
        'show_date' => false,
    );
    return $params;
}