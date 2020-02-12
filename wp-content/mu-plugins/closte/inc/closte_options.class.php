<?php

defined('ABSPATH') OR exit;

class Closte_Options {
    

    private static $default = array(
             'enable_cdn' => '1',
             'url' => '',
             'dirs' => 'wp-content,wp-includes,min',
             'excludes' => '.php',
             'relative' => '1',
             'remove_query_string' => '1',
             'enable_object_cache' => '0',
             'enable_debug' => '0',
             'load_balancer_micro_cache' => '0',
             'load_balancer_micro_cache_seconds' => '30',
              'enable_opcache' => '1',
              'development_mode'=> '0',
              'smtp_configured' => '0',
              'allow_per_site_config'=> '0'
              );

    public static function get_options($global = false) {
       

      

        $current_options = wp_parse_args(get_site_option('closte'), self::$default);

        if($global){
            return $current_options;
        }

        $option = self::$default;
        
        if(is_multisite()){

            if(is_network_admin() || is_main_site()){
                $option = $current_options;              
            }else{

                if($current_options['allow_per_site_config'] == 1){
                    $option = wp_parse_args(get_option('closte'), self::$default);                   
                }else{
                    $option =$current_options;               
                }               
            }            
        }else{
            $option = $current_options;         
        }

        
        $option['url'] = 'https://'.CLOSTE_CDN_HOSTNAME;  

        //fix
        if($option['development_mode'] == 2){
            $option['development_mode'] = 0;
        }

        return $option;

        
    }


   

    public static function save_options($options){
        
        $current_options = wp_parse_args(get_site_option('closte'), self::$default);  


        if(is_multisite()){

            if(is_network_admin() || is_main_site()){
                update_site_option('closte', $options);             
            }else{

                if($current_options['allow_per_site_config'] == 1){
                    update_option('closte', $options);                
                }else{
                    update_site_option('closte', $options);                
                }               
            }            
        }else{
            update_site_option('closte', $options);          
        }

      
    }

   

}