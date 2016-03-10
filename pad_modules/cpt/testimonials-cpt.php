<?php
defined( 'ABSPATH' ) or die( 'Plugin file cannot be accessed directly.' );


add_action( 'init', 'register_cpt_testimonial' );

function register_cpt_testimonial() {
    $labels = array( 
        'name' => _x( 'Testimonial', 'testimonial' ),
        'singular_name' => _x( 'Testimonial', 'testimonial' ),
        'add_new' => _x( 'Add New', 'testimonial' ),
        'add_new_item' => _x( 'Add New Testimonial', 'testimonial' ),
        'edit_item' => _x( 'Edit Testimonial', 'testimonial' ),
        'new_item' => _x( 'New Testimonial', 'testimonial' ),
        'all_items' => _x( 'All Testimonials', 'testimonial' ),
        'view_item' => _x( 'View Testimonials', 'testimonial' ),
        'search_items' => _x( 'Search Testimonials', 'testimonial' ),
        'not_found' => _x( 'No Testimonials found', 'testimonial' ),
        'not_found_in_trash' => _x( 'No Testimonials found in Trash', 'testimonial' ),
        'parent_item_colon' => _x( 'Parent Testimonials:', 'testimonial' ),
        'menu_name' => _x( 'Testimonials', 'testimonial' ),
    );
    $args = array( 
        'labels' => $labels,
        'hierarchical' => true,
        'supports' => array( 'title', 'editor', 'author', 'thumbnail', 'comments', 'revisions', 'post-formats', 'excerpt', 'custom-fields' ),
        'taxonomies' => array( 'testimonials' ),
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'menu_icon' => 'dashicons-format-status',
        'show_in_rest'=> true,
        'show_in_nav_menus' => true,
        'publicly_queryable' => true,
        'exclude_from_search' => false,
        'has_archive' => true,
        'query_var' => true,
        'can_export' => true,
        'rewrite' => array( 'slug' => 'testimonials' ),
        'capability_type' => 'post'
    );
    register_post_type( 'testimonial', $args );
}

add_action( 'init', 'register_taxonomy_testimonial' );

function register_taxonomy_testimonial() {
    $labels = array( 
        'name' => _x( 'Testimonial Type ', 'testimonials' ),
        'singular_name' => _x( 'Testimonial Type', 'testimonials' ),
        'search_items' => _x( 'Search Testimonial Types', 'testimonials' ),
        'popular_items' => _x( 'Popular Testimonial Types', 'testimonials' ),
        'all_items' => _x( 'All Testimonial Types', 'testimonials' ),
        'parent_item' => _x( 'Parent Testimonial Type', 'testimonials' ),
        'parent_item_colon' => _x( 'Parent Testimonial Types:', 'testimonials' ),
        'edit_item' => _x( 'Edit Testimonial Type', 'testimonials' ),
        'update_item' => _x( 'Update Testimonial Type', 'testimonials' ),
        'add_new_item' => _x( 'Add New Testimonial Type', 'testimonials' ),
        'new_item_name' => _x( 'New Testimonial Type', 'testimonials' ),
        'separate_items_with_commas' => _x( 'Separate Testimonial Types with commas', 'testimonials' ),
        'add_or_remove_items' => _x( 'Add or remove Testimonial Types', 'testimonials' ),
        'choose_from_most_used' => _x( 'Choose from the most used Testimonial Types', 'testimonials' ),
        'menu_name' => _x( 'Testimonial Type', 'testimonials' ),
    );
    $args = array( 
        'labels' => $labels,
        'public' => true,
        'show_in_nav_menus' => true,
        'show_ui' => true,
        'show_tagcloud' => true,
        'show_admin_column' => true,
        'hierarchical' => true,
        'rewrite' => array( 'slug' => 'testimonial-type' ),
        'query_var' => true
    );
    register_taxonomy( 'testimonials', array('testimonial'), $args );
}
