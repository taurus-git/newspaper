<?php
class categoriesWidget extends WP_Widget {

    function __construct() {
        parent::__construct(
            'categories_widget',
            'News Categories',
            array( 'description' => 'Add a few categories to display.' )
        );
    }

    public function widget( $args, $instance ) {
        echo $args['before_widget'];

        if (!isset($args['widget_id'])) {
            $args['widget_id'] = $this->id;
        }

        $widget_id = 'widget_' . $args['widget_id'];

        $output = '<div class="col-12 col-sm-6 col-lg-2">
                        <div class="footer-widget-area mt-80">';

        $categories_group_title = get_field('categories-group-title', $widget_id);
        if (!empty($categories_group_title)) {
            $output .= '<h4 class="widget-title">' . $categories_group_title . '</h4>';
        }

        $categories = get_field('categories_widget', $widget_id);
        $output .= '<ul class="list">';

        if (!empty($categories)) {
            foreach ($categories as $id) {
                $term = get_term($id);
                $name = $term->name;
                $link = get_category_link( $id );
                $output .= '<li><a href="' . $link . '">' . $name . '</a></li>';
            }
        }

        $output .= ' </div></div>';
        echo $output;

        echo $args['after_widget'];
    }

    public function form( $instance ) {
    }

    public function update( $new_instance, $old_instance ) {
    }
}

function categories_widget_load() {
    register_widget( 'categoriesWidget' );
}
add_action( 'widgets_init', 'categories_widget_load' );