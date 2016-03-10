<?php
defined( 'ABSPATH' ) or die( 'Plugin file cannot be accessed directly.' );

/**
* Custom post types for theme
*/
include_once( 'cpt/news-cpt.php' );
include_once( 'cpt/case-studies-cpt.php' );
include_once( 'cpt/testimonials-cpt.php' );

/**
* Admin and theme utilities
*/
require_once( 'inc/admin-utility.php' );
require_once( 'inc/image-sizes.php' );
require_once( 'inc/script-styles.php' );


/**
* utility scripts that run on init
*/
add_action( 'init', 'setup_pad_modules_scripts' );

function setup_pad_modules_scripts() {

	wp_enqueue_script( 'jquery' );
	wp_enqueue_script( 'jquery-ui-core' );

	wp_register_script( 'pad_mod_js', get_template_directory_uri().'/pad_modules/assets/pad-scripts.js', array('jquery'));
	wp_register_style( 'pad_mod_css', get_template_directory_uri().'/pad_modules/assets/pad-styles.css');

	wp_enqueue_script( 'pad_mod_js' );
	wp_enqueue_style( 'pad_mod_css' );
}


//add_action( 'after_switch_theme', 'flush_pad_permalinks' );
add_action( 'admin_init', 'flush_pad_permalinks' );

function flush_pad_permalinks() {
	register_cpt_news();
	register_cpt_case_studies();
	register_cpt_testimonial();
	flush_rewrite_rules();
}
