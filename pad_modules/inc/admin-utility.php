<?
defined( 'ABSPATH' ) or die( 'Plugin file cannot be accessed directly.' );

/**
* pad : adds ACF options pages in dashboard
*/
if( function_exists('acf_add_options_page') ) {

	acf_add_options_page(array(
		'page_title' 	=> 'Theme General Settings',
		'menu_title'	=> 'Theme Settings',
		'menu_slug' 	=> 'theme-general-settings',
		'capability'	=> 'manage_options',
		'redirect'		=> false,
		'icon_url'		=> 'dashicons-admin-tools'
	));

	acf_add_options_sub_page(array(
		'page_title' 	=> 'Theme Header Settings',
		'menu_title'	=> 'Header',
		'parent_slug'	=> 'theme-general-settings',
	));

	acf_add_options_sub_page(array(
		'page_title' 	=> 'Theme Footer Settings',
		'menu_title'	=> 'Footer',
		'parent_slug'	=> 'theme-general-settings',
	));


}
add_action( 'admin_menu', 'display_admin_option' );

function display_admin_option() {
	$admin = is_pad_root_admin();

	if ($admin === true) {

		acf_add_options_page(array(
			'page_title' 	=> 'Root Admin',
			'menu_title'	=> 'Root Admin',
			'menu_slug' 	=> 'root-admin-optoins',
			'capability'	=> 'root_access',
			'redirect'		=> false,
			'icon_url'		=> 'dashicons-admin-network'
		));

	}
}

function is_pad_root_admin() {

		global $user;
		$super_admin = false;
		$user = wp_get_current_user();
		$curr = (array) $user->roles;
		$roles = array('root_admin','super_root');

		$roles_found = array_intersect($curr, $roles);
	
		if ( count( $roles_found ) > 0 ) {
			$super_admin = true;
		} else {
			$super_admin = false;
		}
		return $super_admin;

	}

add_filter('acf/settings/show_admin', 'hide_pad_acf_menu');

function hide_pad_acf_menu( $show ) {
	
	global $user;
	$user = wp_get_current_user();

	$curr = (array) $user->roles;
	$roles = array( 'root_admin', 'super_root', 'administrator', 'webmaster' );
	

	$roles_found = array_intersect($curr, $roles);
	
	if ( count( $roles_found ) > 0 ) {
		$show = true;
	} else {
		$show = false;
	}

    return $show;
    
}