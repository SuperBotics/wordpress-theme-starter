<?php

Class Share_Post_Widget extends WP_Widget {

    /**
     * Sets up the widgets name etc
     */
    public function __construct() {
        $widget_ops = array(
            'classname' => 'share_post',
            'description' => 'Single Post page Share Post widget. will not work in any other page',
        );
        parent::__construct(get_called_class(), 'Share Post', $widget_ops);
    }

    function widget($args, $instance) {
        if (!isset($args['widget_id'])) {
            $args['widget_id'] = $this->id;
        }

        $title = (!empty($instance['title']) ) ? $instance['title'] : __('Share Post');

        /** This filter is documented in wp-includes/widgets/class-wp-widget-pages.php */
        $title = apply_filters('widget_title', $title, $instance, $this->id_base);

        if (is_single()) {
            $post = get_post();

            if (!empty($post)) {
                $post_url = get_permalink($post->ID);
                $post_title = $post->post_title;
            } else {
                $post_title = get_bloginfo('name') . ' | ' . get_bloginfo('description');
                $post_url = get_bloginfo('url');
            }

            echo $args['before_widget'];

            if ($title) {
                echo $args['before_title'] . $title . $args['after_title'];
            }
            echo '<div class="social-share-block social-icons">
                        <a class="btn btn-facebook circle" target="_blank" href="https://www.facebook.com/sharer.php?u=' . rawurlencode($post_url) . '">
                            <i class="fa fa-facebook" aria-hidden="true"></i>
                        </a>
                        <a class="btn btn-twitter circle" target="_blank" href="https://twitter.com/intent/tweet?url=' . rawurlencode($post_url) . '&text=' . rawurlencode($post_title) . '&related=' . rawurlencode("www.superbotics.com/blog") . '">
                            <i class="fa fa-twitter" aria-hidden="true"></i>
                        </a>
                        <a class="btn btn-linkedin circle" target="_blank" href="https://www.linkedin.com/shareArticle?url=' . rawurlencode($post_url) . '">
                            <i class="fa fa-linkedin" aria-hidden="true"></i>
                        </a>
                        <a class="btn btn-google circle" target="_blank" href="https://plus.google.com/share?url=' . rawurlencode($post_url) . '">
                            <i class="fa fa-google-plus" aria-hidden="true"></i>
                        </a>
                </div>';
            echo $args['after_widget'];
        }
    }

    /** Widget admin page form **/
    public function form($instance) {
        if (isset($instance['title'])) {
            $title = $instance['title'];
        } else {
            $title = __('Share Post', 'growtheme-child');
        }
        // Widget admin form
        ?>
        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:'); ?></label> 
            <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" />
        </p>
        <?php
    }

    /** Updating widget replacing old instances with new **/
    public function update($new_instance, $old_instance) {
        $instance = array();
        $instance['title'] = (!empty($new_instance['title']) ) ? strip_tags($new_instance['title']) : '';
        return $instance;
    }
}

/**
 * load current class widget
 */
add_action('widgets_init', 'share_post_widget_load');
function share_post_widget_load() {
    register_widget('Share_Post_Widget');
}