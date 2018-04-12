<?php
/**
 * This widget has a a functionality similiar to the text widget.
 * 
 * It echos html without the printing the widget title and preventing
 * additional classes which are be echoed in wordpress text widget
 */
class Theme_Html_Widget extends WP_Widget {

    /**
     * Sets up the widgets name etc
     */
    public function __construct() {
        $widget_ops = array(
            'classname' => 'theme-self-html-widget',
            'description' => 'HTML widget that doesnt any render additional tags',
        );
        parent::__construct(get_called_class(), 'HTML Widget', $widget_ops);
    }

    function widget($args, $instance) {
        echo $instance['html-content'];
    }

    function update($new_instance, $old_instance) {
        $instance = $old_instance;
        $instance['title'] = strip_tags($new_instance['title']);
        $instance['html-content'] = $new_instance['html-content'];
        return $instance;
    }

    function form($instance) {
        ?>

        <label>Widget title: (will not be displayed in the widget)</label>

        <input type="text" class="widefat"  name="<?php echo $this->get_field_name('title'); ?>" id="<?php echo $this->get_field_id('title'); ?>" value="<?php
        if (isset($instance['title'])) {
            esc_html_e($instance['title']);
        }
        ?>" style="margin-top:5px; margin-bottom:5px;">


        <label>HTML Content: </label>
        <textarea rows="15" class="widefat"  name="<?php echo $this->get_field_name('html-content'); ?>" id="<?php echo $this->get_field_id('html-content'); ?>" style="margin-top:5px; margin-bottom:5px;"><?php
            if (isset($instance['html-content'])) {
                esc_html_e($instance['html-content']);
            }
            ?></textarea>

        <?php
    }

}


/**
 * load current class widget
 */
add_action('widgets_init', 'theme_html_widget_load');
function theme_html_widget_load() {
     register_widget('Theme_Html_Widget');
}