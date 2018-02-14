<?php

function sesha_customize_register($wp_customize){

	// Social Media
	// ----------------------------------------------------------------------------
	$wp_customize->add_section( 'section_social', array(
		'priority' => 50,
		'title' => __( 'Social Media Links', 'sesha' ),
		'description' => 'Add your social media accounts here'
	) );

	$wp_customize->add_setting( 'setting_social_facebook', array(
		'default' => 'https://facebook.com/',
		'type' => 'option',
		'capability' => 'edit_theme_options',
		'validate_callback' => 'validate_URL'
		
	) );	
	$wp_customize->add_control( 'social_facebook', array(
		'label' => __( 'Facebook', 'sesha' ),
		'section' => 'section_social',
		'settings'   => 'setting_social_facebook'
	) );


	$wp_customize->add_setting( 'setting_social_twitter', array(
		'default' => 'https://twitter.com/',
		'type' => 'option',
		'capability' => 'edit_theme_options'
	) );
	$wp_customize->add_control( 'setting_social_twitter', array(
		'label' => __( 'Twitter', 'sesha' ),
		'section' => 'section_social',
		'settings'   => 'setting_social_twitter'
	) );


	$wp_customize->add_setting( 'setting_social_pinterest', array(
		'default' => 'https://pinterest.com/',
		'type' => 'option',
		'capability' => 'edit_theme_options'
	) );	
	$wp_customize->add_control( 'setting_social_pinterest', array(
		'label' => __( 'Pinterest', 'sesha' ),
		'section' => 'section_social',
		'settings'   => 'setting_social_pinterest'
	) );


	$wp_customize->add_setting( 'setting_social_linkedin', array(
		'default' => 'https://linkedin.com/',
		'type' => 'option',
		'capability' => 'edit_theme_options'
	) );	
	$wp_customize->add_control( 'setting_social_linkedin', array(
		'label' => __( 'Linkedin', 'sesha' ),
		'section' => 'section_social',
		'settings'   => 'setting_social_linkedin'
	) );


	$wp_customize->add_setting( 'setting_social_googleplus', array(
		'default' => 'https://googleplus.com/',
		'type' => 'option',
		'capability' => 'edit_theme_options'
	) );	
	$wp_customize->add_control( 'setting_social_googleplus', array(
		'label' => __( 'Google+', 'sesha' ),
		'section' => 'section_social',
		'settings'   => 'setting_social_googleplus'
	) );


	$wp_customize->add_setting( 'setting_social_instagram', array(
		'default' => 'https://instagram.com/',
		'type' => 'option',
		'capability' => 'edit_theme_options'
	) );	
	$wp_customize->add_control( 'setting_social_instagram', array(
		'label' => __( 'Instagram', 'sesha' ),
		'section' => 'section_social',
		'settings'   => 'setting_social_instagram'
	) );


	$wp_customize->add_setting( 'setting_social_tumblr', array(
		'default' => 'https://tumblr.com/',
		'type' => 'option',
		'capability' => 'edit_theme_options'
	) );	
	$wp_customize->add_control( 'setting_social_tumblr', array(
		'label' => __( 'Tumblr', 'sesha' ),
		'section' => 'section_social',
		'settings'   => 'setting_social_tumblr'
	) );

	function validate_URL( $validity, $value ) {
		if ( !empty( $value ) && filter_var($value, FILTER_VALIDATE_URL) == false ) {
			$validity->add( 'required', __( 'You must supply a valid URL' ) );
		}
		return $validity;
	}


	// Site Contact details
	// ----------------------------------------------------------------------------
	$wp_customize->add_section( 'section_contact_details', array(
		'priority' => 40,
		'capability' => 'edit_theme_options',
		'theme_supports' => '',
		'title' => __( 'Book Now Link', 'sesha' ),
		'description' => 'Link to the default booking form page'
	) );

    $wp_customize->add_setting('setting_book_now_link', array(
        'capability'     => 'edit_theme_options',
        'type'           => 'option',
    ));

    $wp_customize->add_control('setting_book_now_link', array(
		'label'      => __('Book Now Link', 'sesha'),
		'priority' => 30,
        'section'    => 'section_contact_details',
        'type'    	 => 'dropdown-pages',
        'settings'   => 'setting_book_now_link',
		'allow_addition' => false,
    ));





	// Google Font Loader
	// ----------------------------------------------------------------------------
	$fonts_array = array(
		'Arvo' => 'Arvo',
		'Droid Sans' => 'Droid Sans',
		'Josefin Slab' => 'Josefin Slab',
		'Lato' => 'Lato',
		'Montserrat' => 'Montserrat',
		'Open Sans' => 'Open Sans',
		'Open Sans Condensed' => 'Open Sans Condensed',
		'PT Sans' => 'PT Sans',
		'Quicksand' => 'Quicksand',
		'Roboto' => 'Roboto',
		'Ubuntu' => 'Ubuntu',
		'Vollkorn' => 'Vollkorn'
	);

	$font_weights_array = array(
		// '100' => 'Thin',
		// '200' => 'Extra Light',
		'300' => 'Light',
		'400' => 'Regular',
		'500' => 'Medium',
		// '600' => 'Semi Bold',
		'700' => 'Bold',
		// '800' => 'Extra Bold',
		// '900' => 'Black'
	);

	$wp_customize->add_section( 'section_fonts', array(
		'priority' => 40,
		'capability' => 'edit_theme_options',
		'theme_supports' => '',
		'title' => __( 'Site Fonts', 'sesha' )
	) );

	$wp_customize->add_setting( 'setting_fonts', array(
		'type' => 'option',
		'capability' => 'edit_theme_options'		
	) );
	

    $wp_customize->add_control( 'setting_fonts', array(
		'priority' => 10,
        'settings' => 'setting_fonts',
        'label'   => 'Font Family',
        'section' => 'section_fonts',
        'type'    => 'select',
        'choices'    => $fonts_array
	));

	
	// Font Weights
	// ----------------------------------------------------------------------------
    $wp_customize->add_setting('setting_fonts_weight', array(
		'capability' => 'edit_theme_options',
        'type'       => 'option'
    ));
    $wp_customize->add_control(        
		new sesha_Customize_Control_Checkbox_Multiple($wp_customize, 'setting_fonts_weight',
            array(
				'settings' => 'setting_fonts_weight',
                'section'  => 'section_fonts',
				'label'   => __( 'Font Weights to load', 'sesha' ),
                'choices' => $font_weights_array
            )
        )
	);

	$wp_customize->add_setting('setting_fonts_weight_body', array(
		'capability' => 'edit_theme_options',
        'type'       => 'option'
    ));
    $wp_customize->add_control('setting_fonts_weight_body', array(
        'settings' => 'setting_fonts_weight_body',
		'section'  => 'section_fonts',
		'priority' => 40,
		'label' => __( 'Body Copy Weight', 'sesha' ),
        'type'    => 'select',
        'choices'    => $font_weights_array	
	));	

	// Heading Font
	// ----------------------------------------------------------------------------	
	$wp_customize->add_setting( 'setting_fonts_headings', array(
		'type' => 'option',
		'capability' => 'edit_theme_options'		
	) );
	

    $wp_customize->add_control( 'setting_fonts_headings', array(
		'priority' => 30,
        'settings' => 'setting_fonts_headings',
        'label'   => __( 'Font Family for Headings', 'sesha' ),
        'section' => 'section_fonts',
        'type'    => 'select',
        'choices' =>  $fonts_array
	));

	// Heading Font Weight
	// ----------------------------------------------------------------------------	
    $wp_customize->add_setting('setting_fonts_weight_headings', array(
		'capability' => 'edit_theme_options',
        'type'       => 'option'
    ));
    $wp_customize->add_control('setting_fonts_weight_headings', array(
        'settings' => 'setting_fonts_weight_headings',
		'section'  => 'section_fonts',
		'priority' => 40,
		'label' => __( 'Headings Font Weight', 'sesha' ),
        'type'    => 'select',
        'choices'    => $font_weights_array	
	));

	// Heading Font Weight
	// ----------------------------------------------------------------------------	
    $wp_customize->add_setting('setting_fonts_weight_headings_bold', array(
		'capability' => 'edit_theme_options',
        'type'       => 'option'
    ));
    $wp_customize->add_control('setting_fonts_weight_headings_bold', array(
        'settings' => 'setting_fonts_weight_headings_bold',
		'section'  => 'section_fonts',
		'priority' => 40,
		'label' => __( 'Headings Bold Font Weight', 'sesha' ),
        'type'    => 'select',
        'choices'    => $font_weights_array	
	));
	


}

/**
 * Bind JS handlers to instantly live-preview changes.
 */
function sesha_customize_preview_js() {
	wp_enqueue_script( 'sesha-customize-preview', get_theme_file_uri( '/library/js/customizer/customize-preview.js' ), array( 'customize-preview' ), '1.0', true );
}
add_action( 'customize_preview_init', 'sesha_customize_preview_js' );

/**
 * Load dynamic logic for the customizer controls area.
 */
function sesha_panels_js() {
	wp_enqueue_script( 'sesha-customize-controls', get_theme_file_uri( '/library/js/customizer/customize-controls.js' ), array(), '1.0', true );
}
add_action( 'customize_controls_enqueue_scripts', 'sesha_panels_js' );

add_action('customize_register', 'sesha_customize_register');
add_action( 'wp_head' , 'sesha_dynamic_css' );


// Inject CSS into the head of the webpage
// ----------------------------------------------------------------------------
function sesha_dynamic_css() {
?>   


<?php if( get_option( 'setting_fonts' ) ) : ?>
	<script>
	WebFont.load({
	google: {
		families: ['<?php echo get_option( 'setting_fonts' ); ?>:<?php echo get_option( 'setting_fonts_weight' ); ?>']
	}
	});
	</script>
	<?php endif; ?>

	<?php if( get_option( 'setting_fonts_headings' ) && get_option( 'setting_fonts' ) != get_option( 'setting_fonts_headings' ) ) : ?>
	<script>
	WebFont.load({
	google: {
		families: ['<?php echo get_option( 'setting_fonts_headings' ); ?>:<?php echo get_option( 'setting_fonts_weight_headings' ); ?>']
	}
	});
	</script>
<?php endif; ?>

<style id="customiser-styles">
	body {
		font-family: <?php echo get_option( 'setting_fonts' ); ?>, sans-serif;
		font-weight: <?php echo get_option( 'setting_fonts_weight_body' ); ?>;
	}
	h1, h2, h3, h4,
	.h1, .h2, .h3, .h4,
	.h1-heavy, .h2-heavy, .h3-heavy, .h4-heavy,
	.j1, .j1-heavy,
	.j2, .j2-heavy,
	.j3, .j3-heavy,
	.j4, .j4-heavy {
		font-family: <?php echo get_option( 'setting_fonts_headings' ); ?>, sans-serif;
		font-weight: <?php echo get_option( 'setting_fonts_weight_headings' ); ?>;
	}
	.h1-heavy, .h2-heavy, .h3-heavy, .h4-heavy,
	.j1-heavy, .j2-heavy, .j3-heavy, .j4-heavy {
		font-weight: <?php echo get_option( 'setting_fonts_weight_headings_bold' ); ?>;
	}

</style>
<?php
}