<?php
/**
 * The template for displaying the header
 *
 * Displays all of the head element and everything up until the "container" div.
 *
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */

?>
<!doctype html>
<html class="no-js" <?php language_attributes(); ?> >
	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>" />
		<?php global $is_IE; if ( $is_IE ) : ?>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<?php endif; ?>
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<link rel="icon" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/icons/favicon.ico" type="image/x-icon">
		<link rel="apple-touch-icon" sizes="144x144" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/icons/apple-touch-icon-144x144.png">
		<link rel="apple-touch-icon" sizes="114x114" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/icons/apple-touch-icon-114x114.png">
		<link rel="apple-touch-icon" sizes="72x72" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/icons/apple-touch-icon-72x72.png">
		<link rel="apple-touch-icon" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/icons/apple-touch-icon.png">
		<?php wp_head(); ?>
	</head>
	<body <?php body_class(); ?>>
	<?php do_action( 'foundationpress_after_body' ); ?>

	<?php if ( get_theme_mod( 'wpt_mobile_menu_layout' ) == 'offcanvas' ) : ?>
	<div class="off-canvas-wrapper">
		<div class="off-canvas-wrapper-inner" data-off-canvas-wrapper>
		<?php get_template_part( 'template-parts/mobile-off-canvas' ); ?>
	<?php endif; ?>

	<?php do_action( 'foundationpress_layout_start' ); ?>
	
	<header id="masthead" class="site-header" role="banner">
		<?php if ( get_field( 'toggle_sticky_header', 'option' ) == 'Enabled' ): ?>
			<div data-sticky-container>
			  <div class="sticky" id="sticky" data-sticky data-margin-top="0" style="width:100%;" data-margin-bottom="0">
		<?php endif; ?> 
				<div class="title-bar" data-responsive-toggle="site-navigation">
					<button class="menu-icon" type="button" data-toggle="mobile-menu"></button>
					<div class="title-bar-title">
						<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
					</div>
				</div>
				<div class="top-bar-left">
					<ul class="menu">

						<?php if ( get_field( 'logo_type', 'option' ) == 'Image' ) {
							echo 'Image';
							$image = get_field( 'logo_image', 'option' );
							echo '<a href='.esc_url( home_url( '/' ) ).' ><img src='.$image['url'].' alt=='.$image['alt'].' width="250" height="auto" /></a>';
						} else if ( get_field( 'logo_type', 'option' ) == 'Text' ) {
							echo 'text';

						} else { ?>
							<li class="home"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></li>
						<?php } ?>

					</ul>
				</div>
				<nav id="site-navigation" class="main-navigation top-bar" role="navigation">
					
					<div class="top-bar-right">
						<?php foundationpress_top_bar_r(); ?>

						<?php if ( ! get_theme_mod( 'wpt_mobile_menu_layout' ) || get_theme_mod( 'wpt_mobile_menu_layout' ) == 'topbar' ) : ?>
							<?php get_template_part( 'template-parts/mobile-top-bar' ); ?>
						<?php endif; ?>
					</div>
				</nav>
			<?php if ( get_field( 'toggle_sticky_header', 'option' ) == 'Enabled' ): ?>
				</div>
			</div>
		<?php endif; ?>
	</header>

	<section class="container">
		<?php do_action( 'foundationpress_after_header' );
