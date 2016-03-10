<?
defined( 'ABSPATH' ) or die( 'Plugin file cannot be accessed directly.' );

add_action( 'after_setup_theme', 'pad_image_sizes' );

function pad_image_sizes() {
	//add_image_size( 'category-thumb', 300 ); // 300 pixels wide (and unlimited height)
    //add_image_size( 'homepage-thumb', 220, 180, true ); // (cropped)
}

