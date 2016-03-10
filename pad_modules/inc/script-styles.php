<?php
defined( 'ABSPATH' ) or die( 'Plugin file cannot be accessed directly.' );

/**
* Script styles to run jQuery on pages
*/
//add_action( 'wp_enqueue_scripts', 'pad_s_ss_setup_scripts' );

function pad_s_ss_setup_scripts() {
	wp_enqueue_script( 'jquery' );
	wp_enqueue_script( 'jquery-ui-core' );
}

/**
* Enqueue scripts
*/
//add_action('wp_footer','pad_s_ss_scripts',5);

function pad_s_ss_scripts() { ?>

<?php//$var = get_option('pad_s_option'); ?>

	<script type="text/javascript">
		jQuery(document).ready(function($) {
			

    	}); 
	</script>

<?php }

/**
* Enqueue styles
*/
//add_action('init','pad_s_ss_styles',10);

function pad_s_ss_styles() { ?>
<style type="text/css">

<?php if (is_admin()) { ?>

	

<?php } else { ?>
	
	
	
<?php } ?>
</style>
<?php }