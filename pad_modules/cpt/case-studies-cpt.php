<?php
defined( 'ABSPATH' ) or die( 'Plugin file cannot be accessed directly.' );


add_action( 'init', 'register_cpt_case_studies' );

function register_cpt_case_studies() {
    $labels = array( 
        'name' => _x( 'Case Study', 'case-study' ),
        'singular_name' => _x( 'Case Study', 'case-study' ),
        'add_new' => _x( 'Add New', 'case-study' ),
        'add_new_item' => _x( 'Add New Case Study', 'case-study' ),
        'edit_item' => _x( 'Edit Case Study', 'case-study' ),
        'new_item' => _x( 'New Case Study', 'case-study' ),
        'all_items' => _x( 'All Case Studies', 'case-study' ),
        'view_item' => _x( 'View Case Studies', 'case-study' ),
        'search_items' => _x( 'Search Case Studies', 'case-study' ),
        'not_found' => _x( 'No Case Studies found', 'case-study' ),
        'not_found_in_trash' => _x( 'No Case Studies found in Trash', 'case-study' ),
        'parent_item_colon' => _x( 'Parent Case Studies:', 'case-study' ),
        'menu_name' => _x( 'Case Studies', 'case-study' ),
    );
    $args = array( 
        'labels' => $labels,
        'hierarchical' => true,
        'supports' => array( 'title', 'editor', 'author', 'thumbnail', 'comments', 'revisions', 'post-formats', 'excerpt', 'custom-fields' ),
        'taxonomies' => array( 'case-studies' ),
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'menu_icon' => 'dashicons-clipboard',
        'show_in_rest'=> true,
        'show_in_nav_menus' => true,
        'publicly_queryable' => true,
        'exclude_from_search' => false,
        'has_archive' => true,
        'query_var' => true,
        'can_export' => true,
        'rewrite' => array( 'slug' => 'case-studies' ),
        'capability_type' => 'post'
    );
    register_post_type( 'case-study', $args );
}

add_action( 'init', 'register_taxonomy_case_studies' );

function register_taxonomy_case_studies() {
    $labels = array( 
        'name' => _x( 'Case Study Category ', 'case-studies' ),
        'singular_name' => _x( 'Case Study Category', 'case-studies' ),
        'search_items' => _x( 'Search Case Study Categories', 'case-studies' ),
        'popular_items' => _x( 'Popular Case Study Categories', 'case-studies' ),
        'all_items' => _x( 'All Case Study Categories', 'case-studies' ),
        'parent_item' => _x( 'Parent Case Study Category', 'case-studies' ),
        'parent_item_colon' => _x( 'Parent Case Study Categories:', 'case-studies' ),
        'edit_item' => _x( 'Edit Case Study Category', 'case-studies' ),
        'update_item' => _x( 'Update Case Study Category', 'case-studies' ),
        'add_new_item' => _x( 'Add New Case Study Category', 'case-studies' ),
        'new_item_name' => _x( 'New Case Study Category', 'case-studies' ),
        'separate_items_with_commas' => _x( 'Separate Case Study Categories with commas', 'case-studies' ),
        'add_or_remove_items' => _x( 'Add or remove Case Study Categories', 'case-studies' ),
        'choose_from_most_used' => _x( 'Choose from the most used Case Study Categories', 'case-studies' ),
        'menu_name' => _x( 'Study Category', 'case-studies' ),
    );
    $args = array( 
        'labels' => $labels,
        'public' => true,
        'show_in_nav_menus' => true,
        'show_ui' => true,
        'show_tagcloud' => true,
        'show_admin_column' => true,
        'hierarchical' => true,
        'rewrite' => array( 'slug' => 'study-category' ),
        'query_var' => true
    );
    register_taxonomy( 'case-studies', array('case-study'), $args );
}
