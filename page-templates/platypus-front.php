<?php
/*
Template Name: Platypus Front
*/
get_header(); ?>

<header id="front-hero" role="banner">
	<div class="marketing">
		<div class="tagline">
			<!--<h1><?php bloginfo( 'name' ); ?></h1>-->
			<h4 class="subheader">
				Innovative metal forming.<br>
				Complex assembly technology.<br>
				<strong>EXPECTATIONS EXCEEDED.</strong>
			</h4>
			<!--<a role="button" class="download large button sites-button hide-for-small-only" href="https://github.com/olefredrik/foundationpress">Download FoundationPress</a>-->
		</div>

		<div id="watch">
			<!--<section id="stargazers">
				<a href="https://github.com/olefredrik/foundationpress">1.5k stargazers</a>
			</section>
			<section id="twitter">
				<a href="https://twitter.com/olefredrik">@olefredrik</a>
			</section>-->
		</div>
	</div>

</header>

<?php do_action( 'foundationpress_before_content' ); ?>
<?php while ( have_posts() ) : the_post(); ?>
<section class="intro" role="main">
	<div class="fp-intro">

		<div <?php post_class() ?> id="post-<?php the_ID(); ?>">
			<?php do_action( 'foundationpress_page_before_entry_content' ); ?>
			<div class="entry-content">
				<?php the_content(); ?>
			</div>
			<footer>
				<?php wp_link_pages( array('before' => '<nav id="page-nav"><p>' . __( 'Pages:', 'foundationpress' ), 'after' => '</p></nav>' ) ); ?>
				<p><?php the_tags(); ?></p>
			</footer>
			<?php do_action( 'foundationpress_page_before_comments' ); ?>
			<?php comments_template(); ?>
			<?php do_action( 'foundationpress_page_after_comments' ); ?>
		</div>

	</div>

</section>
<?php endwhile;?>
<?php do_action( 'foundationpress_after_content' ); ?>

<div class="section-divider">
	<!--<hr />-->
</div>

<div class="row">
	<section class="benefits">
		<!--<header>
			<h2>Build Foundation based sites, powered by WordPress</h2>
			<h4>Foundation is the professional choice for designers, developers and teams. <br /> WordPress is by far, <a href="http://trends.builtwith.com/cms">the world's most popular CMS</a> (currently powering 38% of the web).</h4>
		</header>-->

		<div class="semantic">
			<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/demo/semantic.svg" alt="semantic">
			<h3>Semantic</h3>
			<p>Everything is semantic. You can have the cleanest markup without sacrificing the utility and speed of Foundation.</p>
		</div>

		<div class="responsive">
			<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/demo/responsive.svg" alt="responsive">
			<h3>Responsive</h3>
			<p>You can build for small devices first. Then, as devices get larger and larger, layer in more complexity for a complete responsive design.</p>

		</div>

		<div class="customizable">
			<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/demo/customizable.svg" alt="customizable">
			<h3>Customizable</h3>
			<p>You can customize your build to include or remove certain elements, as well as define the size of columns, colors, font size and more.</p>

		</div>

		<div class="professional">
			<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/demo/professional.svg" alt="professional">
			<h3>Professional</h3>
			<p>Millions of designers and developers depend on Foundation. We have business support, training and consulting to help grow your product or service.</p>
		</div>

		<!--<div class="why-foundation">
			<a href="/kitchen-sink">See what's in Foundation out of the box →</a>
		</div>-->

	</section>
</div>
	<section>
		<div>
			<?php
				// check if the repeater field has rows of data
				if( have_rows('homepage_buckets') ):

				 	// loop through the rows of data
				    while ( have_rows('homepage_buckets') ) : the_row();

				        // display a sub field value
				        the_sub_field('bucket_title');
				        the_sub_field('bucket_image');
				        $page = get_sub_field('bucket_page');
				        //var_dump($page);
				        //echo $page['url'];


				    endwhile;


				endif;

				?>
		</div>

		<div class="">
			
			<div class="homepage-subheading">
				<?php if ( get_field( 'sub_header' ) ) {
					$sub_header = get_field( 'sub_header' );
					echo '<div class="sub_header">'.$sub_header.'</div>';
				} ?>

				<?php if ( get_field( 'sub_header_banner' ) ) {
					$sub_header = get_field( 'sub_header_banner' );
					echo '<a href='.$sub_header['url'].'><img src="'.$sub_header['url'].'" alt="'.$sub_header['alt'].'" style="max-height:600px; height: 100%;" /></a>';
				} ?>
			</div>

		</div>

		<div class="text-center">
			<?php 
				echo get_field('testimonial_section');
				if ( get_field('testimonial_section') == "Single" ) {
					if ( get_field( 'testimonial' ) ) {
						var_dump(get_field( 'testimonial' ));
						$testimonial = (array) get_field( 'testimonial' );
						$title = $testimonial['post_title'];
						$content = $testimonial['post_content'];
						//var_dump($testimonial);
						//echo '<h2>'.$title.'</h2>';
						echo '<p>'.$content.'</p>';
					}
				} elseif ( get_field('testimonial_section') == "Multiple" ) {

				} else {
					if ( get_field( 'testimonial' ) ) {
						$testimonial = (array) get_field( 'testimonial' );
						$title = $testimonial['post_title'];
						$content = $testimonial['post_content'];
						//var_dump($testimonial);
						//echo '<h2>'.$title.'</h2>';
						echo '<p>'.$content.'</p>';
					}
				} ?>
			<p>
				<a href="/case-studies" ><button style="background-color:#6ec176; color:#FFF; padding:15px 30px;">View Our Case Studies</button></a>
			</p>
		</div>
	</section>
</div>



<?php get_footer();
