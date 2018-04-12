<?php

    /**
     * File location is relative to the classes folder.
     * So to load the class-theme-core.php call
     * 
     * load_class('/class-theme-helpers.php');
     */
     
    class Theme_Loader{
        
        static $class_list;
        
        public static function start(){
        }
        
        public static function get_classes(){
            return self::$class_list;
        }
        
        public static function set_classes($class_list){
            self::$class_list = $class_list;
        }
        
        public static function load_classes($class_list = []){
            
            if(count($class_list) > 0){
                $class_list = self::$class_list;
            }
            
            foreach(self::$class_list as $class_file_location){
                require_once THEME_CLASSES_PATH . $class_file_location;
            }
        }    
        
    }
    
    Theme_Loader::start();
    