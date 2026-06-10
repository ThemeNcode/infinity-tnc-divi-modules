<?php

if ( ! defined( 'ABSPATH' ) ) exit;

class Inftnc_divi_modules_public {

    public function __construct() {
        add_action( 'wp_enqueue_scripts', [ $this, 'inftnc_divi_modules_assets' ] );
    }

    /**
     * Register front-end scripts and styles.
     *
     * @return void
     */
    public function inftnc_divi_modules_assets() {
        $js  = plugin_dir_url( __FILE__ ) . 'assets/js/';
        $css = plugin_dir_url( __FILE__ ) . 'assets/';

        wp_enqueue_style( 'fontawesome', $css . 'fontawesome/css/all.min.css', [], '6.0.0' );

        wp_register_style( 'slick',                  $css . 'css/slick.min.css',   [],        '1.8.1' );
        wp_register_style( 'slick-theme',            $css . 'css/slick-theme.css', [ 'slick' ], '1.8.1' );
        wp_register_style( 'inftnc-image-carousel',  INFINITY_TNC_DIVI_MODULES_URL . 'divi-4/modules/ImageCarousel/style.css',  [ 'slick', 'slick-theme' ], INFINITY_TNC_DIVI_MODULES_VERSION );
        wp_register_style( 'inftnc-logo-carousel',   INFINITY_TNC_DIVI_MODULES_URL . 'divi-4/modules/LogoCarousel/style.css',   [ 'slick', 'slick-theme' ], INFINITY_TNC_DIVI_MODULES_VERSION );

        wp_register_script( 'inftnc-rating',         $js . 'inftnc-rating.min.js',      [ 'jquery' ],          INFINITY_TNC_DIVI_MODULES_VERSION, true );
        wp_register_script( 'inftnc-rating-module',  $js . 'star-rating-svg.min.js',    [ 'inftnc-rating' ],   INFINITY_TNC_DIVI_MODULES_VERSION, true );
        wp_register_script( 'inftnc-typewriter',     $js . 'typewriter-core.min.js',     [ 'jquery' ],          '2.12.1', true );
        wp_register_script( 'inftnc-typewriter-module', $js . 'inftnc-typewriter.min.js', [ 'inftnc-typewriter' ], INFINITY_TNC_DIVI_MODULES_VERSION, true );
        wp_register_script( 'inftnc-social-share',   $js . 'inftnc-social-share.min.js', [],                   INFINITY_TNC_DIVI_MODULES_VERSION, true );
        wp_register_script( 'slick',                 $js . 'slick.min.js',              [ 'jquery' ],          '1.8.1', true );
        wp_register_script( 'inftnc-slick',          $js . 'inftnc-slick.min.js',       [ 'jquery' ],          INFINITY_TNC_DIVI_MODULES_VERSION, true );
    }
}

new Inftnc_divi_modules_public;
