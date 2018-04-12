<?php

    /** Define your theme contants here */
    
    define('THEME_NAME', 'built-it');
    define('THEME_version', '1.0.0');
    
    define('THEME_DIR', get_template_directory() . '/');
    define('THEME_URL', get_template_directory_uri() . '/');
    
    define('THEME_ASSETS_PATH', get_template_directory() . '/assets/');
    define('THEME_ASSETS_URI', get_template_directory_uri() . '/assets/');
    
    define('THEME_CLASSES_PATH', get_template_directory() . '/classes/');
    
    define('THEME_DEBUG_MODE', false);
    
    
    require_once THEME_CLASSES_PATH . 'loader.php';
    
    
    /**
     * Class Files can be loaded, ordered, conditionally loaded and 
     * all other stuff can be done here
     * 
     */
    Theme_Loader::set_classes ([
        'class-theme-core.php',
        'class-theme-helpers.php',
        
        'widgets/class-theme-widget-custom-html.php',
        'widgets/class-theme-widget-share-post.php',
        
    ]);
                
    Theme_Loader::load_classes();