<?
defined( 'ABSPATH' ) or die( 'Plugin file cannot be accessed directly.' );

add_action( 'after_setup_theme', 'pad_image_sizes' );

function pad_image_sizes() {
	//add_image_size( 'category-thumb', 300 ); // 300 pixels wide (and unlimited height)
    //add_image_size( 'homepage-thumb', 220, 180, true ); // (cropped)
    add_image_size( 'logo', 175, 114 ); // (cropped)
    //add_image_size( 'subheader-banner', 2000, 600, true ); // (cropped)
    //add_image_size( 'subheader-banner-2', 2000, 700, true ); // (cropped)
    //add_image_size( 'subheader-banner-3', 2000, 800, true ); // (cropped)
    add_image_size( 'bucket-image', 400, 300 ); // (cropped)
    add_image_size( 'bucket-image-2', 275, 180 ); // (cropped)
    add_image_size( 'icon-128', 128, 128 ); // (cropped)
    add_image_size( 'small-medium', 250, 175 ); // (cropped)
    add_image_size( 'slider-image', 650, 400 ); // (cropped)
    add_image_size( 'capability-image', 200, 200, true ); // (cropped)
    //add_image_size( 'subheader-banner', 2000, 700, true ); // (cropped)

}

