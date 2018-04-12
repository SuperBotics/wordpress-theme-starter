<?php

class Theme_Helpers {
    
    public static $debug_mode;
    
    public static function start(){
        self::$debug_mode = THEME_DEBUG_MODE;
    }
    
    
    public static function print_object($object, $should_i_die = false){
        if(self::$debug_mode === false){
            return;
        }
        echo '<pre>';
        print_r($object);
        echo '</pre>';
        if($should_i_die === true){
            die('<br/><br/>Stopping Execution after printing the object.....');
        }
    }
    
    public static function dump_object($object, $should_i_die = false){
        if(self::$debug_mode === false){
            return;
        }
    
        echo '<pre>';
        var_dump($object);
        echo '</pre>';
        if($should_i_die === true){
            die('<br/><br/>Stopping Execution after dumpping the object.....');
        }
    }
    
    public static function stack_trace(){
    
        if(self::$debug_mode === false){
            return;
        }
        
        echo '<pre>';
        print_r(debug_backtrace());
        echo '</pre>';
        die('<br/><br/>Stopping Execution after printing the object.....');
    }
    
    public static function get_template( $theme_template_path, $data = array()){
        ob_start();
        require get_template_directory(). '/template-parts/' . $theme_template_path;
        return ob_get_clean();
    }
    
    public static function load_template( $theme_template_path, $data = array()){        
        require get_template_directory(). '/template-parts/' . $theme_template_path;
    }
}

Theme_Helpers::start();