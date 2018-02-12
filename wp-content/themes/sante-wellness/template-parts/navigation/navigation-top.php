<?php
/**
 * Displays top navigation
 *
*/

if( get_field('book_now_link') ) {
	$book_now_url = get_field('book_now_link');
} else {
	$book_now_url = get_permalink( get_option( 'setting_book_now_link' ) );
}
?>

<?php // Site navigation ?>
<div class="wrapper-site-navigation">
	<nav role="navigation" id="site-navigation"  class="navbar-primary cascade-level-1" aria-label="<?php _e( 'Top Menu', 'sesha' ); ?>">
		
		<div class="btn-book-now-cta-mobile-wrapper">
			<a href="<?php echo $book_now_url; ?>" class="btn-book-now-cta-mobile btn btn-secondary btn-lg btn-block">
				Book Now
			</a>
		</div>

		<?php wp_nav_menu(array(
			'container' => false,                           // remove nav container
			'container_class' => '',                 // class of container (should you choose to use it)
			'menu' => __( 'The Main Menu', 'sesha' ),  // nav name
			'menu_class' => 'level-1-list menu ',               // adding custom nav class
			'theme_location' => 'main-nav',                 // where it's located in the theme
			'before' => '',                                 // before the menu
			'after' => '',                                  // after the menu
			'link_before' => '',                            // before each link
			'link_after' => '',                             // after each link
			'depth' => 0,                                   // limit the depth of the nav
			'fallback_cb' => '',                            // fallback function (if there is one)
			'walker' => new site_navigation_menu()
		)); ?>
	</nav>
</div>