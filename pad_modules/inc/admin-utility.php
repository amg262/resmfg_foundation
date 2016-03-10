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
		'capability'	=> 'edit_posts',
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

	/*acf_add_options_page(array(
		'page_title' 	=> 'Admin Options',
		'menu_title'	=> 'Admin Options',
		'menu_slug' 	=> 'admin-options',
		'capability'	=> 'manage_options',
		'redirect'		=> false,
		'icon_url'		=> 'dashicons-admin-tools'
	));*/

	/*acf_add_options_sub_page(array(
		'page_title' 	=> 'Admins',
		'menu_title'	=> 'Admins Only',
		'parent_slug'	=> 'admin-options',
		'capability'	=> 'manage_options',
		'redirect'	=> true
	));

	acf_add_options_sub_page(array(
		'page_title' 	=> 'Exec. Admin',
		'menu_title'	=> 'Admins Only',
		'parent_slug'	=> 'admin-options',
		'capability'	=> 'executive_access'
	));

	acf_add_options_sub_page(array(
		'page_title' 	=> 'Root Admin',
		'menu_title'	=> 'Admins Only',
		'parent_slug'	=> 'admin-options',
		'capability'	=> 'root_access'
	));*/

}
add_action( 'admin_menu', 'display_admin_option' );

function display_admin_option() {
	$admin = is_pad_root_admin();

	if ($admin === true) {

		acf_add_options_page(array(
			'page_title' 	=> 'Root Admin',
			'menu_title'	=> 'Root Admin',
			'menu_slug' 	=> 'root-admin-options',
			'capability'	=> 'root_access',
			'redirect'		=> false,
			'icon_url'		=> 'dashicons-admin-tools'
		));

		/*acf_add_options_sub_page(array(
			'page_title' 	=> 'Admins',
			'menu_title'	=> 'Admins Only',
			'parent_slug'	=> 'admin-options',
			'capability'	=> 'manage_options',
			'redirect'	=> true
		));

		acf_add_options_sub_page(array(
			'page_title' 	=> 'Exec. Admin',
			'menu_title'	=> 'Admins Only',
			'parent_slug'	=> 'admin-options',
			'capability'	=> 'executive_access'
		));

		acf_add_options_sub_page(array(
			'page_title' 	=> 'Root Admin',
			'menu_title'	=> 'Admins Only',
			'parent_slug'	=> 'admin-options',
			'capability'	=> 'root_access'
		));*/
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
	$roles = array( 'root_admin', 'super_root', 'administrator' );
	

	$roles_found = array_intersect($curr, $roles);
	
	if ( count( $roles_found ) > 0 ) {
		$show = true;
	} else {
		$show = false;
	}

    return $show;
    
}