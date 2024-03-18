<?php

if (!defined('ABSPATH')) exit;

class Inftnc_divi_modules_public {

    public function __construct() {
        // Enqueue front script 
        add_action('wp_enqueue_scripts', [$this, 'inftnc_divi_modules_assets']);
        add_action('admin_enqueue_scripts',[$this,'inftnc_divi_admin_assets']);
        
    }


    /***
     *    Load admin Script
     */

     public function inftnc_divi_admin_assets() {
            //Enqueue style 
            // wp_enqueue_style('admin-fontawesome');
            // wp_register_style('admin-fontawesome',plugin_dir_url(__FILE__)."fontawesome/css/all.min.css",array(),'5.15.4');
            
     }

    /**
     *  Load Script 
     *
     * @return void
     */
    public function inftnc_divi_modules_assets() {

        //Enqueue style 
        wp_register_style('fontawesome',plugin_dir_url(__FILE__)."fontawesome/css/all.min.css",array(),'5.15.4');
        wp_enqueue_style('admin-fontawesome');
        wp_register_style('admin-fontawesome',plugin_dir_url(__FILE__)."fontawesome/css/all.min.css",array(),'5.15.4');
        //Enqueue script
        wp_register_script('inftnc-rating',plugin_dir_url(__FILE__)."js/inftnc-rating.js",array('jquery'),'1.0.0',true);
        wp_register_script('inftnc-rating-module',plugin_dir_url(__FILE__)."js/star-rating-svg.min.js",array('inftnc-rating'),'1.0.0',true);
        wp_register_script('inftnc-typewriter', plugin_dir_url( __FILE__)."js/typewriter-core.js", array('jquery'),'2.12.1',true);
        wp_register_script('inftnc-typewriter-module', plugin_dir_url( __FILE__)."js/inftnc-typewriter.js", array('inftnc-typewriter'),'1.0.0',true);
        wp_register_script('inftnc-social-share', plugin_dir_url(__FILE__)."js/inftnc-social-share.js", array(),'1.0.0',true);
      
       
      
    }

                   


}


new Inftnc_divi_modules_public;