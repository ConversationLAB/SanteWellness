<?php

// let's create the function for the custom type
function register_custom_post_NAME() {
	// creating (registering) the custom type
	register_post_type( 'example_post_type', /* (http://codex.wordpress.org/Function_Reference/register_post_type) */
		// let's now add all the options for this post type
		array( 'labels' => array(
				'name' => __( 'Custom Post Type', 'sesha' ), /* This is the Title of the Group */
				'singular_name' => __( 'CUSTOM POST Item', 'sesha' ), /* This is the individual type */
				'all_items' => __( 'All CUSTOM POST Items', 'sesha' ), /* the all items menu item */
				'add_new' => __( 'Add New CUSTOM POST Item', 'sesha' ), /* The add new menu item */
				'add_new_item' => __( 'Add New CUSTOM POST Item', 'sesha' ), /* Add New Display Title */
				'edit' => __( 'Edit CUSTOM POST Item', 'sesha' ), /* Edit Dialog */
				'edit_item' => __( 'Edit CUSTOM POST Items', 'sesha' ), /* Edit Display Title */
				'new_item' => __( 'Add New CUSTOM POST Item', 'sesha' ), /* New Display Title */
				'view_item' => __( 'View CUSTOM POST Item', 'sesha' ), /* View Display Title */
				'search_items' => __( 'Search CUSTOM POST Items', 'sesha' ), /* Search Custom Type Title */
				'not_found' =>  __( 'No CUSTOM POST Items found', 'sesha' ), /* This displays if there are no entries yet */
				'not_found_in_trash' => __( 'No CUSTOM POST Items found in Trash', 'sesha' ), /* This displays if there is nothing in the trash */
				'parent_item_colon' => ''
			), /* end of arrays */
		'description' => __( 'CUSTOM POST DESCRIPTION', 'sesha' ), /* Custom Type Description */
			'public' => true,
			'publicly_queryable' => true,
			'exclude_from_search' => true,
			'show_ui' => true,
			'query_var' => true,
			'menu_position' => 10, /* this is what order you want it to appear in on the left hand side menu */
			'menu_icon' => 'dashicons-hammer', /* the icon for the custom post type menu */
			//'rewrite'	=> array( 'slug' => 'careers', 'with_front' => false ), /* you can specify its url slug */
			'has_archive' => true, /* you can rename the slug here */
			// 'capability_type' => 'post',
			// 'hierarchical' => false,
			/* the next one is important, it tells what's enabled in the post editor */
			'supports' => array( 'title', 'editor', 'revisions',)
		) /* end of options */
	); /* end of register post type */

}

function register_custom_taxonomy_NAME() {
    register_taxonomy(
        'example_taxonomy',
        'example_post_type',
        array(
            'labels' => array(
                'name' => 'Categories',
                'add_new_item' => 'Add New Category',
                'new_item_name' => "New Category"
            ),
            'show_ui' => true,
            'show_tagcloud' => false,
            'hierarchical' => true
        )
    );
}

// adding the function to the Wordpress init
add_action( 'init', 'register_custom_post_NAME');
add_action( 'init', 'register_custom_taxonomy_NAME' );