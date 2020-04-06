<?php

require_once 'inc/cpt/news.php';

add_action( 'wp_enqueue_scripts', 'add_theme_styles' );
function add_theme_styles() {
    wp_register_style('newspaper-styles',get_template_directory_uri() . '/style.css', array(), null);
    wp_enqueue_style('newspaper-styles');
}

add_action( 'wp_enqueue_scripts', 'add_theme_scripts' );
function add_theme_scripts() {
    wp_deregister_script( 'jquery' );
    wp_register_script( 'jquery', get_template_directory_uri() . '/assets/js/jquery/jquery-2.2.4.min.js', false, NULL, true );
    wp_enqueue_script( 'jquery' );

    wp_enqueue_script( 'popper', get_template_directory_uri() .'/assets/js/bootstrap/popper.min.js', array('jquery'), null, true );
    wp_enqueue_script( 'bootstrap', get_template_directory_uri() .'/assets/js/bootstrap/bootstrap.min.js', array('jquery'), null, true );
    wp_enqueue_script( 'plugins', get_template_directory_uri() .'/assets/js/plugins/plugins.js', array('jquery'), null, true );
    wp_enqueue_script( 'active', get_template_directory_uri() .'/assets/js/active.js', array('jquery'), null, true );
}

add_action( 'after_setup_theme', function(){
    register_nav_menus( array(
        'main-menu' => __( 'Main Menu' ),
        'footer-menu' => __( 'Footer Menu' ),
    ) );
} );


if ( function_exists( 'add_theme_support' ) ) {
    add_theme_support( 'post-thumbnails' );
    set_post_thumbnail_size( 150, 150 );
}

if ( function_exists( 'add_image_size' ) ) {
    add_image_size( 'single_featured_big', 530, 420, true ); // Кадрирование изображения
    add_image_size( 'single_featured_post', 420, 333, true ); // Кадрирование изображения
    add_image_size( 'single_featured_post_2', 287, 199, true ); // Кадрирование изображения
    add_image_size( 'small_featured_post', 90, 90, true ); // Кадрирование изображения
    add_image_size( 'single_blog_post', 350, 307, true ); // Кадрирование изображения
    add_image_size( 'single_blog_post_vertical', 255, 312, true ); // Кадрирование изображения
    add_image_size( 'single_blog_post_sidebar', 255, 101, true ); // Кадрирование изображения
}

function get_post_author_name($post) {
    //if (!is_a($post, 'WP_Post')) return;
    $author_id = $post->post_author;
    var_dump($post);
    $name = get_the_author_meta('display_name', $author_id);
    return $name;
}

add_filter( 'excerpt_more', 'new_excerpt_more' );
function new_excerpt_more( $more ){
    global $post;
    return '<a href="'. get_permalink($post) . '">Читать дальше...</a>';
}

function get_author_ful_name ($author_id) {
    $fname = get_the_author_meta('first_name', $author_id);
    $lname = get_the_author_meta('last_name', $author_id);
    $full_name = '';

    if( empty($fname)){
        $full_name = $lname;
    } elseif( empty( $lname )){
        $full_name = $fname;
    } else {
        $full_name = "{$fname} {$lname}";
    }

    return $full_name;
}