<?php
add_action( 'wp_enqueue_scripts', 'add_theme_styles' );
function add_theme_styles() {
    wp_register_style('newspaper-styles',get_template_directory_uri() . '/style.css', array(), null);
    wp_enqueue_style('newspaper-styles');
}

add_action( 'wp_enqueue_scripts', 'add_theme_scripts' );
function add_theme_scripts() {
    wp_deregister_script( 'jquery' );
    wp_register_script( 'jquery', includes_url( '/assets/js/jquery/jquery-2.2.4.min.js' ), false, NULL, true );
    wp_enqueue_script( 'jquery' );

    wp_enqueue_script( 'popper', get_template_directory_uri() .'/assets/js/bootstrap/popper.min.js', array('jquery'), null, true );
    wp_enqueue_script( 'bootstrap', get_template_directory_uri() .'/assets/js/bootstrap/bootstrap.min.js', array('jquery'), null, true );
    wp_enqueue_script( 'plugins', get_template_directory_uri() .'/assets/js/plugins/plugins.js', array('jquery'), null, true );
    wp_enqueue_script( 'active', get_template_directory_uri() .'/assets/js/active.js', array('jquery'), null, true );
}
