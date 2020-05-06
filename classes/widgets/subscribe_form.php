<?php
class subscribeFormWidget extends WP_Widget {

    function __construct() {
        parent::__construct(
            'subscribe_form_widget',
            'Subscribe form',
            array( 'description' => 'Shows subscribe form. Paste shortcode here.' )
        );
    }

    public function widget( $args, $instance ) {
        $title = apply_filters( 'widget_title', $instance['title'] );
        $description = apply_filters( 'widget_description', $instance['description'] );
        $contact_form_shortcode = apply_filters( 'widget_contact_form_shortcode', $instance['contact_form_shortcode'] );

        echo '<div class="newsletter-widget">';

        if ( ! empty( $title ) )
            echo '<h4>' . $title . '</h4>';

        if ( ! empty( $description ))
            echo '<p>' . $description . '</p>';

        if ( ! empty( $contact_form_shortcode ) )
            $output = '<form action="#" method="post">';
            $contact_form = do_shortcode($contact_form_shortcode);
            $output .= $contact_form . '</form>';

            echo $output;

        echo '</div>';
    }

    public function form( $instance ) {
        if ( isset( $instance[ 'title' ] ) ) {
            $title = $instance[ 'title' ];
        }
        if ( isset( $instance[ 'description' ] ) ) {
            $description = $instance[ 'description' ];
        }
        if ( isset( $instance[ 'contact_form_shortcode' ] ) ) {
            $contact_form_shortcode = $instance[ 'contact_form_shortcode' ];
        }
        ?>
        <p>
            <label for="<?php echo $this->get_field_id( 'title' ); ?>">Title</label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id( 'description' ); ?>">Description</label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'description' ); ?>" name="<?php echo $this->get_field_name( 'description' ); ?>" type="text" value="<?php echo esc_attr( $description ); ?>" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id( 'contact_form_shortcode' ); ?>">Shortcode</label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'contact_form_shortcode' ); ?>" name="<?php echo $this->get_field_name( 'contact_form_shortcode' ); ?>" type="text" value="<?php echo esc_attr( $contact_form_shortcode ); ?>" />
        </p>
        <?php
    }

    public function update( $new_instance, $old_instance ) {
        $instance = array();
        $instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
        $instance['description'] = ( ! empty( $new_instance['description'] ) ) ? strip_tags( $new_instance['description'] ) : '';
        $instance['contact_form_shortcode'] = ( ! empty( $new_instance['contact_form_shortcode'] ) ) ? strip_tags( $new_instance['contact_form_shortcode'] ) : '';
        return $instance;
    }
}

function subscribe_form_widget_load() {
    register_widget( 'subscribeFormWidget' );
}
add_action( 'widgets_init', 'subscribe_form_widget_load' );