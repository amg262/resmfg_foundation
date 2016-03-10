<?php
/*
Template Name: Platypus Front
*/
get_header(); ?>



<header id="front-hero" role="banner">

	<div class="banner-container left columns twelve large-12 medium 12 small-12">
		<div class="banner-text text-left marketing left columns large-7 medium-12 small-12">
			<h1 class="subheader">
				Innovative metal forming.<br>
				Complex assembly technology.<br>
				<strong>EXPECTATIONS EXCEEDED.</strong>
			</h1>

		</div>

		<div class="banner-image left columns large-5 medium-12 small-12">

		<?php

		if ( get_field( 'banner_type', 'option' ) == 'Image' ) {

			if ( get_field( 'banner_image', 'option' ) ) {

				if ( get_field( 'banner_text', 'option' ) ) {
					$text = get_field( 'banner_text', 'option' );
				}

				$image = get_field( 'banner_image', 'option' );

				echo '<h3>'.$text.'</h3>';
				echo '<a href='.$image['url'].'><img src="'.$image['url'].'" alt="'.$image['alt'].'"/></a>';
			} else {

			}

		} else if ( get_field( 'banner_type', 'option' ) == 'Slider' ) {
			
			if ( get_field( 'banner_slider', 'option' ) ) {
				$slider = get_field( 'banner_slider', 'option' );
				echo do_shortcode($slider);
			} else {
				
			}

		} else {

		} ?>
		</div>
	</div>
	<div class="marketing">
		<!--<div class="tagline">-->
			<!--<h1><?php bloginfo( 'name' ); ?></h1>-->
			<!--<h4 class="subheader">
				Innovative metal forming.<br>
				Complex assembly technology.<br>
				<strong>EXPECTATIONS EXCEEDED.</strong>
			</h4>-->
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
<!--
<?php //do_action( 'foundationpr<!--ess_before_content' ); ?>
<?php //while ( have_posts() ) : the_post(); ?>
<section class="intro" role="main">
	<div class="fp-intro">

		<div <?php post_class() ?> id="post-<?php the_ID(); ?>">
			<?php //do_action( 'foundationpress_page_before_entry_content' ); ?>
			<div class="entry-content">
				<?php the_content(); ?>
			</div>
			<footer>
				<?php //wp_link_pages( array('before' => '<nav id="page-nav"><p>' . __( 'Pages:', 'foundationpress' ), 'after' => '</p></nav>' ) ); ?>
				<p><?php the_tags(); ?></p>
			</footer>
			<?php //do_action( 'foundationpress_page_before_comments' ); ?>
			<?php comments_template(); ?>
			<?php //do_action( 'foundationpress_page_after_comments' ); ?>
		</div>

	</div>

</section>
<?php //endwhile;?>
<?php //do_action( 'foundationpress_after_content' ); ?>
-->
<div class="section-divider">
	<!--<hr />-->
</div>

<!--<div class="row">
	<section class="benefits">-->
		<!--<header>
			<h2>Build Foundation based sites, powered by WordPress</h2>
			<h4>Foundation is the professional choice for designers, developers and teams. <br /> WordPress is by far, <a href="http://trends.builtwith.com/cms">the world's most popular CMS</a> (currently powering 38% of the web).</h4>
		</header>-->

		<!--<div class="semantic">
			<img src="<?php //echo get_stylesheet_directory_uri(); ?>/assets/images/demo/semantic.svg" alt="semantic">
			<h3>Semantic</h3>
			<p>Everything is semantic. You can have the cleanest markup without sacrificing the utility and speed of Foundation.</p>
		</div>

		<div class="responsive">
			<img src="<?php //echo get_stylesheet_directory_uri(); ?>/assets/images/demo/responsive.svg" alt="responsive">
			<h3>Responsive</h3>
			<p>You can build for small devices first. Then, as devices get larger and larger, layer in more complexity for a complete responsive design.</p>

		</div>

		<div class="customizable">
			<img src="<?php //echo get_stylesheet_directory_uri(); ?>/assets/images/demo/customizable.svg" alt="customizable">
			<h3>Customizable</h3>
			<p>You can customize your build to include or remove certain elements, as well as define the size of columns, colors, font size and more.</p>

		</div>

		<div class="professional">
			<img src="<?php //echo get_stylesheet_directory_uri(); ?>/assets/images/demo/professional.svg" alt="professional">
			<h3>Professional</h3>
			<p>Millions of designers and developers depend on Foundation. We have business support, training and consulting to help grow your product or service.</p>
		</div>

		<div class="why-foundation">
			<a href="/kitchen-sink">See what's in Foundation out of the box →</a>
		</div>-->

	<!--</section>
</div>-->
	<section>
		<div class="bucket-container columns small-12 medium-12 large-12">
			<?php
				// check if the repeater field has rows of data
				if( have_rows('homepage_buckets') ):

					//Get number of rows
					$net = count( get_field( 'homepage_buckets' ) );
					$total = intval( $net );
					$count = 0; //loop counter
					$index = 0;
					$grid_ratio = 0; //grid ratio fraction
					$space = " ";
					$column_class = "col-";
					$grid_ratio_class = "ratio-";
					$grid_bucket_class = "bucket-grid-";

					//Checking for oddd or even amount of rows
					//Used for styling and applying class
					if ( $total % 2 == 0 ) {
						$grid_bucket_class .= "even";
					} else {
						$grid_bucket_class .= "odd";
					}

					//Getting variable from options page for algorithm. Default is 2
					if ( get_field( 'bucket_grid_variable', 'option' ) ) {
						$grid_var = intval( get_field( 'bucket_grid_variable', 'option' ) );
					} else {
						$grid_var = 2;
					}

					//Getting ratio to know how we want grid displayed
					$grid_ratio = ($total / $grid_var);

				
				 	// loop through the rows of bucket repeater field
				    while ( have_rows('homepage_buckets') ) : the_row();
				    	$index++;

				    	$column_class = "col-".$index;

				    	//checking for first iteration
				    	if ($count == 0):

				    		//Getting number for displaying grid
				    		
				   
				    		//Checking if grid ratio is a whole number or integer
				    		//Depending on the ratio the grid will have differnt demensions.
				    		//If its not a whole number or integer we give it the same grid.
				    		if ( is_int( $grid_ratio ) ) :

				    			$grid_ratio_class .= "integer";

					    		switch ($grid_ratio) {

								    case ( $grid_ratio <= 1 ):
								        _e( '<div class='.$grid_bucket_class.$space.$grid_ratio_class.$space.
								        	'columns text-center small-up-1 medium-up-2 large-up-2">', 'resmfg_foundation' );
								        break;

							        case ( $grid_ratio <= 2 ):

								        _e( '<div class="'.$grid_bucket_class.$space.$grid_ratio_class.$space.
								        	'columns text-center small-up-1 medium-up-2 large-up-4">', 'resmfg_foundation' );
								        break;

								    case ( $grid_ratio <= 3 ):

								        _e( '<div class="'.$grid_bucket_class.$space.$grid_ratio_class.$space.
								        	'columns text-center small-up-1 medium-up-2 large-up-3">', 'resmfg_foundation' );
								        break;

								    case ( $grid_ratio <= 4 ):

								        _e( '<div class="'.$grid_bucket_class.$space.$grid_ratio_class.$space.
								        	'columns text-center small-up-1 medium-up-2 large-up-4">', 'resmfg_foundation' );
								        break;

								    case ( $grid_ratio <= 6 ):

								        _e( '<div class="'.$grid_bucket_class.$space.$grid_ratio_class.$space.
								        	'columns text-center small-up-1 medium-up-2 large-up-4">', 'resmfg_foundation' );
								        break;

								    case ( $grid_ratio <= 8 ):

								        _e( '<div class="'.$grid_bucket_class.$space.$grid_ratio_class.$space.
								        	'columns text-center small-up-1 medium-up-2 large-up-4">', 'resmfg_foundation' );
								        break;

							        case ( $grid_ratio > 8 ):

								        _e( '<div class="'.$grid_bucket_class.$space.$grid_ratio_class.$space.
								        	'columns text-center small-up-2 medium-up-3 large-up-4">', 'resmfg_foundation' );
								        break;

								    default:

								        _e( '<div class="'.$grid_bucket_class.$space.$grid_ratio_class.$space.
								        	'columns text-center small-up-1 medium-up-2 large-up-3">', 'resmfg_foundation' );
								}

							else:
								//Grid to display on any non-integer grid ratio
				    			$grid_ratio_class .= "decimal";

								
						        _e( '<div class="'.$grid_bucket_class.$space.$grid_ratio_class.$space.
						        	'columns text-center small-up-1 medium-up-2 large-up-3">', 'resmfg_foundation' );

							endif;
				    		
				    	endif; 

				    	//Checking if current column is even or odd number
				    	if ( $index % 2 == 0 ):
				    		$column_class .= $space."even";
				    	else:
				    		$column_class .= $space."odd";
				    	endif; ?>

						 <div class="column <?php echo $column_class; ?> ">
						 	<div class="">
							 	<?php

							 	$title = get_sub_field('bucket_title');
							 	$image = get_sub_field( 'bucket_image' );
							 	$page =  get_sub_field('bucket_page');

							 	//var_dump($page);

								echo '<a href='.$page.'><img src="'.$image['sizes']['medium'].'" alt="'.$image['alt'].'"  /><p><h3>'.$title.'</h3></p></a>'; ?>
							 </div>
						    <!--<img src="//placehold.it/300x300" class="thumbnail" alt="">-->
						 </div><!--end of column-->

						<?php $count++; //increment count
				        
				        //Close grid divs if loop is complete
				        if ($count === $total): ?>
				        	</div><!--end of grid-->
				        <?php endif;

				        endwhile; //end of loop

			       	//reset psot data
				    wp_reset_postdata();

				endif; //end of have rows ?>
		</div>
	</section>
	<div class="clear"></div>
	<section>
		<div class="">
			
			<div class="homepage-subheading">
				<?php if ( get_field( 'sub_header' ) ) {
					$sub_header = get_field( 'sub_header' );
					echo '<div class="sub_header">'.$sub_header.'</div>';
				} ?>

				<?php if ( get_field( 'sub_header_banner' ) ) {
					$sub_header = get_field( 'sub_header_banner' );
					echo '<a href='.$sub_header['url'].'><img class="subheader-banner" src="'.$sub_header['url'].'" alt="'.$sub_header['alt'].'"  /></a>';
				} ?>
			</div>

		</div>

		<div class="text-center">
			<?php 
				//echo get_field('testimonial_section');
				if ( get_field( 'testimonial' ) ) :

					if ( get_field('testimonial_section') === "Single" ) {

							
						$testimonial = get_field( 'testimonial' );

						foreach ($testimonial as $post) {
							setup_postdata($post);
							//var_dump($post);
							_e( $post->post_title, 'resmfg_foundation' );
							_e( $post->post_content, 'resmfg_foundation' );
						}
							
					} elseif ( get_field('testimonial_section') === "Multiple" ) {

						if ( get_field( 'testimonials' ) ): ?>

							
							<script type="text/javascript" charset="utf-8">
							  /*$(window).load(function() {
							    $('.flexslider').flexslider();
							  });*/

							  jQuery(document).ready(function($){
 
   								$('.flexslider').flexslider({
     								//animation: "slide",
      								//animationLoop: false,
      								//itemWidth: 257,
      								//itemMargin: 5
	
  									});
   								});
							</script>

							<?php
							$testimonials = array();
							$testimonials = (array) get_field( 'testimonials' );
							$counter = 0; ?>
							
							<div class="flexslider">

								<ul class="slides">	
									<?php foreach ($testimonials as $post):			
										//foreach ($testimonial as $post) {

											setup_postdata($post);
											echo '<li class="slide">';
											$title = $post->post_title;
											$content = $post->post_content;
											$excerpt = $post->post_excerpt;
											$title_cap = strtoupper($title);

											echo '<h3>'.$content.'</h3>';
											echo '<h5>'.$title_cap.'</h5>';
											echo '<br>';
											echo $excerpt;

											echo '</li>';
											$counter++;
										//}
									endforeach; ?>

									</ul>
								</div>

						<?php endif;


					} else {

						
					} 

					wp_reset_postdata();
				endif;
				?>
			<p>
				<?php if ( get_field( 'button_link', 'option' ) ):
					$link = get_field( 'button_link', 'option' );
				else:
					$link = '#';
				endif; ?>

				<a href="<?php echo $link; ?>" ><button class="green-btn">View Our Case Studies</button></a>
			</p>
		</div>
	</section>
</div>



<?php get_footer();
