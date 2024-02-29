<?php

if (!defined('ABSPATH')) exit;

class Inftnc_divi_modules_public {

    /**
     * Init The Class 
     */
    public function __construct() {
        // Enqueue front script 
        add_action('wp_enqueue_scripts', [$this, 'inftnc_divi_modules_assets']);
    }


    /**
     *  Load Script 
     *
     * @return void
     */
    public function inftnc_divi_modules_assets() {

        //Enqueue style 
       
        //Enqueue script
        wp_register_script('inftnc-rating-module',plugin_dir_url(__FILE__)."js/star-rating-svg.min.js",array('jquery'),1.0,true);
       

    }


}


new Inftnc_divi_modules_public;