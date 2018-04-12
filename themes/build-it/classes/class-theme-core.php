<?php

class Theme_Core {
    
    public static function start(){
        
        add_action('wp_enqueue_scripts', array(get_called_class(), 'load_scripts'));
    }
    
    public static function load_scripts(){
        
        wp_enqueue_script(
            'theme-vendor-js', 
            THEME_ASSETS_URI . '/js/vendor.js',
            array('jquery'), 
            filemtime(THEME_ASSETS_PATH . '/js/vendor.js' )
        );
        
        wp_enqueue_script(
            'theme-main-js', 
            THEME_ASSETS_URI . '/js/main.js',
            array('jquery'), 
            filemtime(THEME_ASSETS_PATH . '/js/main.js' )
        );
        
        
        wp_enqueue_style(
            'theme-vendor-css', 
            THEME_ASSETS_URI . '/css/vendor.css',
            array(),
            filemtime(THEME_ASSETS_PATH . '/css/vendor.css' )
        );
        
        wp_enqueue_style(
            'theme-main-css', 
            THEME_ASSETS_URI . '/css/main.css',            
            array('theme-vendor-css'),
            filemtime(THEME_ASSETS_PATH . '/css/main.css' )
        );
    }
    
}

Theme_Core::start();