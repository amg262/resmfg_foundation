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
        
        'supports' => array( 'title', 'editor', 'author', 'thumbnail', 'comments', 'revisions' ),
        'taxonomies' => array( 'news' ),
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
        'rewrite' => array( 'slug' => 'case-study' ),
        'capability_type' => 'post'
    );
    register_post_type( 'case-study', $args );
}

add_action( 'init', 'register_taxonomy_case_studies' );

function register_taxonomy_case_studies() {
    $labels = array( 
        'name' => _x( 'Case Study Type ', 'case-studies' ),
        'singular_name' => _x( 'Case Study Type', 'case-studies' ),
        'search_items' => _x( 'Search Case Study Types', 'case-studies' ),
        'popular_items' => _x( 'Popular Case Study Types', 'case-studies' ),
        'all_items' => _x( 'All Case Study Types', 'case-studies' ),
        'parent_item' => _x( 'Parent Case Study Type', 'case-studies' ),
        'parent_item_colon' => _x( 'Parent Case Study Types:', 'case-studies' ),
        'edit_item' => _x( 'Edit Case Study Type', 'case-studies' ),
        'update_item' => _x( 'Update Case Study Type', 'case-studies' ),
        'add_new_item' => _x( 'Add New Case Study Type', 'case-studies' ),
        'new_item_name' => _x( 'New Case Study Type', 'case-studies' ),
        'separate_items_with_commas' => _x( 'Separate Case Study Types with commas', 'case-studies' ),
        'add_or_remove_items' => _x( 'Add or remove Case Study Types', 'case-studies' ),
        'choose_from_most_used' => _x( 'Choose from the most used Case Study Types', 'case-studies' ),
        'menu_name' => _x( 'Case Study Type', 'case-studies' ),
    );
    $args = array( 
        'labels' => $labels,
        'public' => true,
        'show_in_nav_menus' => true,
        'show_ui' => true,
        'show_tagcloud' => true,
        'show_admin_column' => true,
        'hierarchical' => true,
        'rewrite' => array( 'slug' => 'case-study-type' ),
        'query_var' => true
    );
    register_taxonomy( 'case-studies', array('case-study'), $args );
}


add_action( 'init', 'register_cpt_news' );

function register_cpt_news() {
    $labels = array( 
        'name' => _x( 'News', 'news' ),
        'singular_name' => _x( 'News', 'news' ),
        'add_new' => _x( 'Add New', 'news' ),
        'add_new_item' => _x( 'Add New News', 'news' ),
        'edit_item' => _x( 'Edit News', 'news' ),
        'new_item' => _x( 'New News', 'news' ),
        'all_items' => _x( 'All News Posts', 'agent' ),
        'view_item' => _x( 'View News', 'news' ),
        'search_items' => _x( 'Search News', 'news' ),
        'not_found' => _x( 'No news found', 'news' ),
        'not_found_in_trash' => _x( 'No news found in Trash', 'news' ),
        'parent_item_colon' => _x( 'Parent News:', 'news' ),
        'menu_name' => _x( 'Company News', 'news' ),
    );
    $args = array( 
        'labels' => $labels,
        'hierarchical' => true,
        
        'supports' => array( 'title', 'editor', 'author', 'thumbnail', 'comments', 'revisions' ),
        'taxonomies' => array( 'news' ),
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'menu_icon' => 'dashicons-format-aside',
        'show_in_rest'=> true,
        'show_in_nav_menus' => true,
        'publicly_queryable' => true,
        'exclude_from_search' => false,
        'has_archive' => true,
        'query_var' => true,
        'can_export' => true,
        'rewrite' => array( 'slug' => 'news' ),
        'capability_type' => 'post'
    );
    register_post_type( 'news', $args );
}

add_action( 'init', 'register_taxonomy_news' );

function register_taxonomy_news() {
    $labels = array( 
        'name' => _x( 'News Categories', 'news' ),
        'singular_name' => _x( 'News Category', 'news' ),
        'search_items' => _x( 'Search News Categories', 'news' ),
        'popular_items' => _x( 'Popular News Categories', 'news' ),
        'all_items' => _x( 'All News Categories', 'news' ),
        'parent_item' => _x( 'Parent News Category', 'news' ),
        'parent_item_colon' => _x( 'Parent News Category:', 'news' ),
        'edit_item' => _x( 'Edit News Category', 'news' ),
        'update_item' => _x( 'Update News Category', 'news' ),
        'add_new_item' => _x( 'Add New News Category', 'news' ),
        'new_item_name' => _x( 'New News Category', 'news' ),
        'separate_items_with_commas' => _x( 'Separate news categories with commas', 'news' ),
        'add_or_remove_items' => _x( 'Add or remove news categories', 'news' ),
        'choose_from_most_used' => _x( 'Choose from the most used news categories', 'news' ),
        'menu_name' => _x( 'News Category', 'news' ),
    );
    $args = array( 
        'labels' => $labels,
        'public' => true,
        'show_in_nav_menus' => true,
        'show_ui' => true,
        'show_tagcloud' => true,
        'show_admin_column' => true,
        'hierarchical' => true,
        'rewrite' => array( 'slug' => 'news-category' ),
        'query_var' => true
    );
    register_taxonomy( 'news-archive', array('news'), $args );
}
