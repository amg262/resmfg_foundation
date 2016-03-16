<?php
/*
Template Name: Platypus Industries
*/
get_header(); ?>



<header id="front-hero" role="banner">

	<div class="banner-container left columns twelve large-12 medium 12 small-12">
		<div class="banner-text text-left marketing left columns large-7 medium-12 small-12">
			<h1 class="subheader">
				<?php //get page title ?>
			</h1>

		</div>

		<div class="banner-image left columns large-5 medium-12 small-12">

		<?php

			if ( get_field( 'banner_image' ) ) {

				if ( get_field( 'banner_text' ) ) {
					$text = get_field( 'banner_text' );
				}

				$image = get_field( 'banner_image' );

				echo '<h3>'.$text.'</h3>';
				echo '<a href='.$image['url'].'><img src="'.$image['url'].'" alt="'.$image['alt'].'"/></a>';
			} else {


			} ?>
		</div>
	</div>

</header>

<div class="section-divider">
	<!--<hr />-->
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
</div>

	<section>
		<!--<div class="bucket-container columns small-12 medium-12 large-12">-->
			<?php
				// check if the repeater field has rows of data
				if( have_rows('industries_buckets') ):

					//Get number of rows
					$net = count( get_field( 'industries_buckets' ) );
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
				    while ( have_rows('industries_buckets') ) : the_row();
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
						
							 	<?php

							 	$title = get_sub_field('bucket_title');
							 	$image = get_sub_field( 'bucket_image' );
							 	$page =  get_sub_field('bucket_page');

							 	//var_dump($page);

								echo '<a href='.$page.'><img src="'.$image['sizes']['medium'].'" alt="'.$image['alt'].'"  /><h3 class="bucket-title">'.$title.'</h3></a>'; ?>
							 
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
		<!--</div>-->
	</section>
	<div class="clear"></div>
	
</div>



<?php get_footer();
