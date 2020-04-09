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

function excerpt($limit, $id) {
    $excerpt = explode(' ', get_the_excerpt($id), $limit);

    if (count($excerpt) >= $limit) {
        array_pop($excerpt);
        $excerpt = implode(" ", $excerpt) . '...';
    } else {
        $excerpt = implode(" ", $excerpt);
    }

    $excerpt = preg_replace('`\[[^\]]*\]`', '', $excerpt);

    return $excerpt;
}

function get_author_id ($post_id) {
    $post = get_post($post_id);
    $author_id = intval($post->post_author);

    return $author_id;
}

function get_author_full_name ($author_id) {
    $first_name = get_the_author_meta('first_name', $author_id);
    $last_name = get_the_author_meta('last_name', $author_id);
    $full_name = '';

    if( empty($first_name)){
        $full_name = $last_name;
    } elseif( empty( $last_name )){
        $full_name = $first_name;
    } else {
        $full_name = "{$first_name} {$last_name}";
    }

    return $full_name;
}

function get_time () {
    $time_format = 'g:i A';
    $time = get_the_date($time_format);
    return $time;
}

function get_date ($date_format) {
    //$default_date_format = get_default_date_format();
    $date = get_the_date($date_format);
    return $date;
}

function get_default_date_format() {
    $date_format = 'F j, Y';
    return $date_format;
}