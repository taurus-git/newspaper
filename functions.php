<?php

add_action( 'wp_enqueue_scripts', 'add_theme_scripts' );
function add_theme_scripts() {
    // подключаем файл стилей темы
    wp_register_style('newspaper-styles',get_template_directory_uri() . '/style.css', array(), null);
    wp_enqueue_style('newspaper-styles');

}
