<?
defined( 'ABSPATH' ) or die( 'Plugin file cannot be accessed directly.' );

/**
* pad : adds ACF options pages in dashboard
*/
if( function_exists('acf_add_options_page') ) {

	acf_add_options_page(array(
		'page_title' 	=> 'Theme General Options',
		'menu_title'	=> 'Theme Options',
		'menu_slug' 	=> 'theme-general-options',
		'capability'	=> 'manage_options',
		'redirect'		=> false,
		'icon_url'		=> 'dashicons-list-view'
	));

	acf_add_options_sub_page(array(
		'page_title' 	=> 'Theme Header Settings',
		'menu_title'	=> 'Header',
		'parent_slug'	=> 'theme-general-options',
	));

	acf_add_options_sub_page(array(
		'page_title' 	=> 'Theme Footer Settings',
		'menu_title'	=> 'Footer',
		'parent_slug'	=> 'theme-general-options',
	));


}
add_action( 'admin_menu', 'display_admin_option' );

function display_admin_option() {
	$admin = is_pad_root_admin();

	if ($admin === true) {

		acf_add_options_page(array(
			'page_title' 	=> 'SuperRoot',
			'menu_title'	=> 'SuperRoot',
			'menu_slug' 	=> 'super-root-options',
			'capability'	=> 'root_access',
			'redirect'		=> false,
			'icon_url'		=> 'dashicons-lock'
		));

	}


		acf_add_options_page(array(
			'page_title' 	=> 'Administrator',
			'menu_title'	=> 'Administrator',
			'menu_slug' 	=> 'Administrator-options',
			'capability'	=> 'admin_2_access',
			'redirect'		=> false,
			'icon_url'		=> 'dashicons-unlock'
		));

	


}
function is_pad_admin_2() {

		global $user;
		$super_admin = false;
		$user = wp_get_current_user();
		$curr = (array) $user->roles;
		$roles = array('admin_2','administrator_2');

		$roles_found = array_intersect($curr, $roles);
	
		if ( count( $roles_found ) > 0 ) {
			$super_admin = true;
		} else {
			$super_admin = false;
		}
		return $super_admin;

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
	$roles = array( 'root_admin', 'administrator_2' );
	

	$roles_found = array_intersect($curr, $roles);
	
	if ( count( $roles_found ) > 0 ) {
		$show = true;
	} else {
		$show = false;
	}

    return $show;
    
}