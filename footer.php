<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the "off-canvas-wrap" div and all content after.
 *
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */

?>

		</section>
		<div id="footer-container">
			<footer id="footer">
				<?php do_action( 'foundationpress_before_footer' ); ?>
				<?php dynamic_sidebar( 'footer-widgets' ); ?>
				<?php do_action( 'foundationpress_after_footer' ); ?>
				<br>
				
				<div class="contact-address text-center right column large-12 medium-12 small-12">
					<p>
						<?php if(get_field('company_name','options') ||
				        get_field('address_line_1','options') ||
				        get_field('address_line_2','options') ||
				        get_field('city/state','options') ||
				        get_field('zip','options') ||
				        get_field('country','options') ||
				        get_field('city/state','options') ||
				        get_field('phone_number', 'options') ||
				        get_field('fax', 'options') ||
				        get_field('email', 'options') ||
				        get_field( 'copyright', 'option' )) { ?>
				            <address class="contact-address text-center right column large-12 medium-12 small-12" itemscope itemtype="http://schema.org/PostalAddress">
				                <small><?php if(get_field('company_name','options')) { echo "<span class='company-copyright'>&copy; ".date('Y')."&nbsp;</span>"; echo "<span class='company-copyright' itemprop='name'>"; the_field('company_name','options'); echo "</span>.&nbsp;"; } ?>
				                <?php if ( get_field( 'copyright', 'option' ) ){ echo '<span class="company-copyright">'; the_field( 'copyright', 'option' ); echo '</span><br>'; } ?>
				                <?php if(get_field('address_line_1','options')) { echo "<span itemprop='streetAddress addressLocality'>"; the_field('address_line_1','options'); echo "</span>&nbsp;"; } ?>
				                
				                <?php if(get_field('address_line_2','options')) { echo "<span itemprop='streetAddress addressLocality'>"; the_field('address_line_2','options'); echo "</span>&nbsp;"; } ?>
				                <?php if(get_field('city/state','options')) { echo "<span itemprop='addressRegion'>"; the_field('city/state','options'); echo "</span>&nbsp;"; } ?>
				                <?php if(get_field('zip','options')) {  echo "<span itemprop='postalCode'>"; the_field('zip','options'); echo "</span>&nbsp;"; } ?>
				                <?php if(get_field('country','options')) { echo "<span>"; the_field('country','options'); echo "</span>&nbsp;"; } ?>
				                <?php if(get_field('phone_number', 'options')) { echo "<span itemprop='telephone'><strong>Phone:</strong> "; ?> <a href="tel:<?php the_field('phone_number', 'options'); ?>"><?php the_field('phone_number', 'options'); echo "</a></span>&nbsp;"; } ?>
				                <?php if(get_field('fax', 'options')) { echo "<span itemprop='fax'><strong>Fax:</strong> "; the_field('fax', 'options'); echo "</span>&nbsp;"; } ?>
				                <?php
				                if(get_field('email', 'options')) { echo "<span itemprop='email'>"; ?> <a href="mailto:<?php the_field('email', 'options'); ?>"> <?php the_field('email', 'options'); ?></a><?php echo "</span>"; } // condition for divider ?></small>

				            </address><!-- .contact-address -->
				        <?php } ?>
				    </p>
			      
			        <?php if ( get_field( 'platypus_link', 'option' ) !== 'Hide' ): ?>
	                    <?php if(is_home() || is_front_page()) { ?>
	                    <small>Design and Developed by <a itemprop="url" href="http://platypus-ad.com" target="_blank">Platypus Advertising + Design</a></small>
	                    <?php }
	                endif; ?>

			</footer>
		</div>

		<?php do_action( 'foundationpress_layout_end' ); ?>

<?php if ( get_theme_mod( 'wpt_mobile_menu_layout' ) == 'offcanvas' ) : ?>
		</div><!-- Close off-canvas wrapper inner -->
	</div><!-- Close off-canvas wrapper -->
</div><!-- Close off-canvas content wrapper -->
<?php endif; ?>


<?php wp_footer(); ?>
<script type='text/javascript' id="__bs_script__">//<![CDATA[
    document.write("<script async src='http://HOST:3000/browser-sync/browser-sync-client.2.11.1.js'><\/script>".replace("HOST", location.hostname));
//]]>
</script>
<?php do_action( 'foundationpress_before_closing_body' ); ?>

</body>
</html>
