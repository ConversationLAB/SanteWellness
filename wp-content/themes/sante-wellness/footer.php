<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
*/

?>
<?php get_sidebar(); ?>

<footer id="site-footer" class="site-footer / has-menu-animation  clearfix" role="contentinfo" itemscope itemtype="http://schema.org/WPFooter">
	<h1 class="sr-only">Footer</h1>
	<div class="container">
		<div class="row">
			<div class="col-sm-6 baseline-sm">
				<?php wp_nav_menu(array(
					'container' => false,                           // remove nav container
					'container_class' => '',                 // class of container (should you choose to use it)
					'menu' => __( 'The Footer Menu', 'sesha' ),  // nav name
					'menu_class' => 'footer__menu / menu-horz-flex',               // adding custom nav class
					'before' => '',                                 // before the menu
					'after' => '',                                  // after the menu
					'link_before' => '',                            // before each link
					'link_after' => '',                             // after each link
					'depth' => 0,                                   // limit the depth of the nav
					'fallback_cb' => '',                            // fallback function (if there is one)
					'walker' => new site_footer_menu()
				)); ?>
			</div>

			<div class="col-sm-6 baseline-sm">
				<div class="footer-social-media__wrapper / text-center">
					<ul class="footer-social-media__menu menu-horz-inline / baseline-xs">
					<?php if( get_option( 'setting_social_facebook' ) ) : ?>
						<li>
							<a href="<?php echo get_option( 'setting_social_facebook' ); ?>" class="footer-social-icon">
								<i class="fa fa-facebook-square" aria-hidden="true"></i>
								<span class="sr-only">Facebook</span>
							</a>
						</li>
					<?php endif; ?>
					<?php if( get_option( 'setting_social_twitter' ) ) : ?>
						<li>
							<a href="<?php echo get_option( 'setting_social_twitter' ); ?>" class="footer-social-icon">
								<i class="fa fa-twitter-square" aria-hidden="true"></i>
								<span class="sr-only">Twitter</span>
							</a>
						</li>
					<?php endif; ?>
					<?php if( get_option( 'setting_social_instagram' ) ) : ?>
						<li>
							<a href="<?php echo get_option( 'setting_social_instagram' ); ?>" class="footer-social-icon">
								<i class="fa fa-instagram" aria-hidden="true"></i>
								<span class="sr-only">Instagram</span>
							</a>
						</li>
					<?php endif; ?>
					<?php if( get_option( 'setting_social_pinterest' ) ) : ?>
						<li>
							<a href="<?php echo get_option( 'setting_social_pinterest' ); ?>" class="footer-social-icon">
								<i class="fa fa-pinterest-square" aria-hidden="true"></i>
								<span class="sr-only">pinterest</span>
							</a>
						</li>
					<?php endif; ?>
					<?php if( get_option( 'setting_social_linkedin' ) ) : ?>
						<li>
							<a href="<?php echo get_option( 'setting_social_linkedin' ); ?>" class="footer-social-icon">
								<i class="fa fa-linkedin-square" aria-hidden="true"></i>
								<span class="sr-only">LinkedIn</span>
							</a>
						</li>
					<?php endif; ?>					
					<?php if( get_option( 'setting_social_googleplus' ) ) : ?>
						<li>
							<a href="<?php echo get_option( 'setting_social_googleplus' ); ?>" class="footer-social-icon">
								<i class="fa fa-google-plus-square" aria-hidden="true"></i>
								<span class="sr-only">googleplus</span>
							</a>
						</li>
					<?php endif; ?>								
					<?php if( get_option( 'setting_social_tumblr' ) ) : ?>
						<li>
							<a href="<?php echo get_option( 'setting_social_tumblr' ); ?>" class="footer-social-icon">
								<i class="fa fa-tumblr-square" aria-hidden="true"></i>
								<span class="sr-only">tumblr</span>
							</a>
						</li>
					<?php endif; ?>					
					</ul>
				</div>				
			</div>
		</div>
 

		<?php get_template_part( 'template-parts/footer/site', 'info' ); ?>


	</div> <!-- END .container -->

</footer>
<div class="page-wrapper-overlay"></div>

<?php wp_footer(); ?>

<!--[if lte IE 9]>
<?php get_template_part( 'template-parts/_legacy-ie', 'message' ); ?>
<![endif]-->

</body>
</html>
