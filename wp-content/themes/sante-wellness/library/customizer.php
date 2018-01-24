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


	// Google Analytics
	// ----------------------------------------------------------------------------
	$wp_customize->add_section( 'section_analytics', array(
		'priority' => 40,
		'capability' => 'edit_theme_options',
		'theme_supports' => '',
		'title' => __( 'Site Analytics', 'sesha' ),
		'description' => 'Add your Google or Minion Analytics account details'
	) );

	$wp_customize->add_setting( 'setting_google_analytics', array(
		'default' => '',
		'type' => 'option',
		'capability' => 'edit_theme_options',
		'validate_callback' => 'validate_UA_code'
	) );
	
	$wp_customize->add_control( 'setting_google_analytics', array(
		'type' => 'text',
		'priority' => 10,
		'section' => 'section_analytics',
		'settings'   => 'setting_google_analytics',
		'label' => __( 'Google Analytics Code', 'sesha' ),
		'description' => 'Add your Analytics code here, in this format : <br> UA-XXXXXXX-XX',
	) );

	function validate_UA_code( $validity, $value ) {
		if ( !empty( $value ) && preg_match('/^ua-\d{4,9}-\d{1,4}$/i', strval($value)) == 0 ) {
			$validity->add( 'required', __( 'You must supply a valid UA code.' ) );
		}
		return $validity;
	}




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
		'Roboto' => 'Roboto',
		'Ubuntu' => 'Ubuntu',
		'Vollkorn' => 'Vollkorn'
	);

	$font_weights_array = array(
		'100' => 'Thin',
		'200' => 'Extra Light',
		'300' => 'Light',
		'400' => 'Regular',
		'500' => 'Medium',
		'600' => 'Semi Bold',
		'700' => 'Bold',
		'800' => 'Extra Bold',
		'900' => 'Black'
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
				'label'   => __( 'Font Weight', 'sesha' ),
                'choices' => $font_weights_array
            )
        )
	);

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
        'choices'    => array(
            'Arvo' => 'Arvo',
            'Droid Sans' => 'Droid Sans',
            'Josefin Slab' => 'Josefin Slab',
            'Lato' => 'Lato',
            'Montserrat' => 'Montserrat',
            'Open Sans' => 'Open Sans',
            'Open Sans Condensed' => 'Open Sans Condensed',
            'PT Sans' => 'PT Sans',
            'Roboto' => 'Roboto',
            'Ubuntu' => 'Ubuntu',
            'Vollkorn' => 'Vollkorn'
        )
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
	


	function validate_google_font( $validity, $value ) {
		if ( !empty( $value ) ) {
			$validity->add( 'required', __( 'You must supply a valid font.' ) );
		}
		return $validity;
	}


	// Add Custom Colours to 'Colors' Panel
	// ----------------------------------------------------------------------------	
	$wp_customize->add_setting('setting_accent_color', array(
			'default' => '#333333',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control($wp_customize, 'setting_accent_color',
			array(
				'label'      => __( 'Accent Color', 'sesha' ), 
				'section'    => 'colors',
				'settings'   => 'setting_accent_color'
			)
		)
	);


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
<style id="customiser-styles">
.jumbotron {
	color: #<?php echo get_header_textcolor() ?>;
}
</style>
<?php
}