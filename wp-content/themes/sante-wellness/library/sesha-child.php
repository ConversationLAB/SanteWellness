<?php
// Get the theme rollin'
// -------------------------------------------------------------------------------
function launch_sesha_child() {

	// Enqueue child scripts and styles
	add_action( 'wp_enqueue_scripts', 'sesha_child_scripts_and_styles' );
	add_action( 'wp_print_scripts', 'sesha_dequeue_script', 100 );

	// Add new sidebars
	add_action( 'widgets_init', 'sesha_sidebar_init' );

	// Set Google API key for maps
	// add_action('acf/init', 'sesha_after_acf_init');

	// launching this stuff after theme setup
	sesha_theme_support_child();

}


// Set Google API key for maps
// -------------------------------------------------------------------------------
function sesha_after_acf_init() {
	acf_update_setting('google_api_key', "XXXXXXXXXXXXXXXXXXXXXXXXXXXXXX");
}


// Call filters and actions
// -------------------------------------------------------------------------------
add_action( 'after_setup_theme', 'launch_sesha_child' );

// Theme Suppport 
// -------------------------------------------------------------------------------
// Adding WP 3+ Functions & Theme Support
function sesha_theme_support_child() {
	// registering wp3+ menus
	register_nav_menus(
		array(
			'main-nav' => __( 'The Main Menu', 'sesha' ),   // main nav in header
		)
	);

	// Add theme support for Featured Image
	add_theme_support( 'post-thumbnails' ); 
	set_post_thumbnail_size( 450, 450, array( 'center', 'center') );


	add_theme_support( "title-tag" ) ;

	// Add theme support for Custom Logo.
	add_theme_support( 'custom-logo', array(
		'width'       => 250,
		'height'      => 250,
		'flex-width'  => true,
		'flex-height'  => true,
		'header-text' => array( 'site-title', 'site-description' )
	) );

}


// Sidebars
// -------------------------------------------------------------------------------
function sesha_sidebar_init() {
	register_sidebar( array(
		'name' => __( 'Sidebar', 'sesha' ),
		'id' => 'sidebar',
		'description' => __( 'Widgets that appear in the sidebar', 'sesha' ),
		'before_widget' => '<div id="%1$s" class="sidebar__item %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="sidebar__heading">',
		'after_title'   => '</h2>',
	) );
}



// CSS and JS assets loading from parent and child themes
// -------------------------------------------------------------------------------
function sesha_child_scripts_and_styles() {

	wp_register_style( 'sesha-child-styles', get_stylesheet_directory_uri() . '/library/css/style-child.css', array(), '' );
	wp_enqueue_style( 'sesha-child-styles' );

	wp_register_script( 'google-font-loader', 'https://ajax.googleapis.com/ajax/libs/webfont/1.6.26/webfont.js' );
	wp_enqueue_script( 'google-font-loader' );

	wp_register_script( 'sesha-head-child', get_template_directory_uri() . '/library/scripts/head.min.js' );
	wp_enqueue_script( 'sesha-head-child' );

	wp_register_script( 'sesha-js-child', get_template_directory_uri() . '/library/scripts/scripts.min.js', array( 'jquery' ), '', true );
	wp_enqueue_script( 'sesha-js-child' );	

}


function sesha_dequeue_script() {
	wp_dequeue_script( 'sesha-head' ); // Dequeue the child script, but keep the parent script. 
}