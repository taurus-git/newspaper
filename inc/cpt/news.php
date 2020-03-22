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
