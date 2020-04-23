<?php

require_once 'inc/cpt/news.php';
require_once 'classes/widgets/popular_news.php';
require_once 'classes/widgets/subscribe_form.php';

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
    add_image_size( 'single_blog_post_vertical', 530, 648, true ); // Кадрирование изображения
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

function get_date ($date_format, $id) {
    $date = get_the_date($date_format, $id);
    return $date;
}

function get_default_date_format() {
    $date_format = 'F j, Y';
    return $date_format;
}

function get_taxonomy_name ($term) {
    $name = $term->name;
    return $name;
}

function get_taxonomy_link ($term) {
    $term_id = $term->term_id;
    $link = get_term_link($term_id);
    return $link;
}

function get_news_category_id ($post_id) {
    $category = get_the_terms( $post_id, 'news_category' );
    $category_id = $category[0]->term_id;
    return $category_id;
}

function get_most_viewed_posts () {
    $most_viewed_posts = newspaper_get_most_viewed("num=10 &echo=0 &return=array");
    return $most_viewed_posts;
}

/* Page view counter  */
add_action('wp_head', 'newspaper_postviews');
function newspaper_postviews() {

    $meta_key       = 'views';
    $who_count      = 1;
    $exclude_bots   = 1;

    global $user_ID, $post;
    if(is_singular()) {
        $id = (int)$post->ID;
        static $post_views = false;
        if($post_views) return true;
        $post_views = (int)get_post_meta($id,$meta_key, true);
        $should_count = false;
        switch( (int)$who_count ) {
            case 0: $should_count = true;
                break;
            case 1:
                if( (int)$user_ID == 0 )
                    $should_count = true;
                break;
            case 2:
                if( (int)$user_ID > 0 )
                    $should_count = true;
                break;
        }
        if( (int)$exclude_bots==1 && $should_count ){
            $useragent = $_SERVER['HTTP_USER_AGENT'];
            $notbot = "Mozilla|Opera";
            $bot = "Bot/|robot|Slurp/|yahoo";
            if ( !preg_match("/$notbot/i", $useragent) || preg_match("!$bot!i", $useragent) )
                $should_count = false;
        }

        if($should_count)
            if( !update_post_meta($id, $meta_key, ($post_views+1)) ) add_post_meta($id, $meta_key, 1, true);
    }
    return true;
}

function newspaper_get_most_viewed( $args = '' ){
    global $wpdb, $post;

parse_str( $args, $i );

    $num    = isset( $i['num'] )    ? preg_replace( '/[^0-9,\s]/', '', $i['num'] ) : 10; // 20,10 | 10
    $key    = isset( $i['key'] )    ? sanitize_text_field($i['key']) : 'views';
    $order  = isset( $i['order'] ) && in_array( strtoupper($i['order']), [ 'ASC', 1 ] )  ? 'ASC' : 'DESC';
    $days   = isset( $i['days'] )   ? (int) $i['days'] : 0;
    $format = isset( $i['format'] ) ? stripslashes( $i['format'] ) : '';
    $cache  = isset( $i['cache'] );
    $echo   = isset( $i['echo'] )   ? (int) $i['echo'] : 1;
    $return = isset( $i['return'] ) ? $i['return'] : 'string';

    if( $cache ){
        $cache_key = (string) md5( __FUNCTION__ . serialize( $args ) );

        if( $cache_out = wp_cache_get( $cache_key ) ){
            if( $echo )
                return print( $cache_out );
            else
                return $cache_out;
        }
    }

    if( $days ){
        $AND_days = "AND post_date > CURDATE() - INTERVAL $days DAY";
        if( strlen( $days ) == 4 )
            $AND_days = "AND YEAR(post_date)=$days";
    }

    $esc_key = esc_sql( $key );
    $sql = "SELECT *, (pm.meta_value+0) AS views
	FROM $wpdb->posts p
		LEFT JOIN $wpdb->postmeta pm ON (pm.post_id = p.ID)
	WHERE pm.meta_key = '$esc_key' $AND_days
		AND p.post_type = 'news'
		AND p.post_status = 'publish'
	ORDER BY views $order LIMIT $num";

    $posts = $wpdb->get_results( $sql );
    if( ! $posts )
        return false;

    if( 'array' === $return )
        return $posts;

    $out = $x = '';
    preg_match( '!{date:(.*?)}!', $format, $date_m );

    foreach( $posts as $pst ){

        $x = ( $x == 'li1' ) ? 'li2' : 'li1';

        if( $pst->ID == $post->ID )
            $x .= ' current-item';

        $Title    = $pst->post_title;
        $a1       = '<a href="' . get_permalink( $pst->ID ) . "\" title=\"{$pst->views} просмотров: $Title\">";
        $a2       = '</a>';
        $comments = $pst->comment_count;
        $views    = $pst->views;

        if( $format ){

            $date    = apply_filters( 'the_time', mysql2date( $date_m[ 1 ], $pst->post_date ) );
            $Sformat = str_replace( $date_m[ 0 ], $date, $format );
            $Sformat = str_replace( [ '{a}', '{title}', '{/a}', '{comments}', '{views}' ], [ $a1, $Title, $a2, $comments, $views, ], $Sformat );
        }
        else
            $Sformat = $a1 . $Title . $a2;

        $out .= "<li class=\"$x\">$Sformat</li>";
    }

    if( $cache )
        wp_cache_add( $cache_key, $out );

    if( $echo )
        echo $out;
    else
        return $out;
}

function get_news_from_category_id ($news_from_category) {
    $category_id = $news_from_category->term_id;
    return $category_id;
}

function get_popular_news_from_category () {
    $news_from_category = get_field('popular_news_area');
    return $news_from_category;
}


function newspaper_register_wp_sidebars() {
    register_sidebar(
        array(
            'id' => 'info_side',
            'name' => 'Info side',
            'description' => 'Drag widgets here to add them to the sidebar.',
            'before_widget' => '',
            'after_widget'  => '',
            'before_title'  => '',
            'after_title'   => '',
        )
    );
}

add_action( 'widgets_init', 'newspaper_register_wp_sidebars' );