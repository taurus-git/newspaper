<?php
class newspaperTopPostsWidget extends WP_Widget {

    function __construct() {
        parent::__construct(
            'newspaper_top_widget',
            'Popular News',
            array( 'description' => 'Gets number of popular News.' )
        );
    }

    public function widget( $args, $instance ) {
        $title = apply_filters( 'widget_title', $instance['title'] );
        $posts_per_page = $instance['posts_per_page'];

        echo '<div class="popular-news-widget mb-30">';

        if ( ! empty( $title ) )
            echo '<h3>' . $title . '</h3>';
        else
            echo '<h3>' . $posts_per_page . ' Most Popular News' . '</h3>';

        $popular_news = newspaper_get_most_viewed("num=$posts_per_page &echo=0 &return=array");;
        if (empty($popular_news)) return;

        $output = '';
        $i = 0;

        foreach ($popular_news as $news) {
            $i++;
            $id = $news->ID;
            $link = get_permalink($id);
            $title = esc_html(get_the_title($id));
            $date_format = get_default_date_format();
            $date = get_date($date_format, $id);

            $output .= sprintf('<div class="single-popular-post">
                <a href="%s">
                    <h6>
                        <span>%s.</span>
                        %s
                    </h6>
                </a>
                <p>%s</p>
            </div>', $link, $i, $title, $date );
        }

        echo $output;
        echo '</div>';
    }

    public function form( $instance ) {
        if ( isset( $instance[ 'title' ] ) ) {
            $title = $instance[ 'title' ];
        }
        if ( isset( $instance[ 'posts_per_page' ] ) ) {
            $posts_per_page = $instance[ 'posts_per_page' ];
        }
        ?>
        <p>
            <label for="<?php echo $this->get_field_id( 'title' ); ?>">Title</label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id( 'posts_per_page' ); ?>">Number of news:</label>
            <input id="<?php echo $this->get_field_id( 'posts_per_page' ); ?>" name="<?php echo $this->get_field_name( 'posts_per_page' ); ?>" type="text" value="<?php echo ($posts_per_page) ? esc_attr( $posts_per_page ) : '4'; ?>" size="3" />
        </p>
        <?php
    }

    public function update( $new_instance, $old_instance ) {
        $instance = array();
        $instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
        $instance['posts_per_page'] = ( is_numeric( $new_instance['posts_per_page'] ) ) ? $new_instance['posts_per_page'] : '4';
        return $instance;
    }
}

function newspaper_top_posts_widget_load() {
    register_widget( 'newspaperTopPostsWidget' );
}
add_action( 'widgets_init', 'newspaper_top_posts_widget_load' );