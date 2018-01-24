<?php
function sesha_customize_register_examples($wp_customize){

	// Example Custom Options
	// ----------------------------------------------------------------------------
    $wp_customize->add_section('section_customise_options', array(
        'title'    => __('Theme Custom Options', 'sesha'),
        'priority' => 120,
    ));


    //  =============================
    //  = Text Input                =
    //  =============================
    $wp_customize->add_setting('setting_text_test', array(
        'default'        => 'Some default text',
        'capability'     => 'edit_theme_options',
        'type'           => 'option',

    ));

    $wp_customize->add_control('sesha_text_test', array(
        'label'      => __('Text Test', 'sesha'),
        'section'    => 'section_customise_options',
        'settings'   => 'setting_text_test',
    ));

    //  =============================
    //  = Radio Input               =
    //  =============================
    $wp_customize->add_setting('setting_color_scheme', array(
        'default'        => 'value2',
        'capability'     => 'edit_theme_options',
        'type'           => 'option'
    ));

    $wp_customize->add_control('section_customise_options', array(
        'label'      => __('Color Scheme', 'sesha'),
        'section'    => 'section_customise_options',
        'settings'   => 'setting_color_scheme',
        'type'       => 'radio',
        'choices'    => array(
            'value1' => 'Choice 1',
            'value2' => 'Choice 2',
            'value3' => 'Choice 3',
        ),
    ));

    //  =============================
    //  = Checkbox                  =
    //  =============================
    $wp_customize->add_setting('setting_checkbox_test', array(
        'capability' => 'edit_theme_options',
        'type'       => 'option'
    ));

    $wp_customize->add_control('sesha_checkbox_test', array(
        'settings' => 'setting_checkbox_test',
        'label'    => __('Checkbox Option'),
        'section'  => 'section_customise_options',
        'type'     => 'checkbox'
    ));

    //  =============================
    //  = Multiple Checkboxs        =
    //  =============================
    $wp_customize->add_setting('setting_checkboxes', array(
		'capability' => 'edit_theme_options',
        'type'       => 'option'
    ));
    $wp_customize->add_control(        
		new sesha_Customize_Control_Checkbox_Multiple($wp_customize, 'setting_checkboxes',
            array(
				'settings' => 'setting_checkboxes',
                'section'  => 'section_customise_options',
				'label'   => __( 'Multiple Checkboxes', 'sesha' ),
                'choices' => array(
					'100' => 'Value 1',
					'200' => 'Value 2'
                )
            )
        )
	);



    //  =============================
    //  = Select Box                =
    //  =============================
     $wp_customize->add_setting('setting_header_select', array(
        'default'        => 'value2',
        'capability'     => 'edit_theme_options',
        'type'           => 'option',

    ));
    $wp_customize->add_control( 'example_select_box', array(
        'settings' => 'setting_header_select',
        'label'   => 'Select Something:',
        'section' => 'section_customise_options',
        'type'    => 'select',
        'choices'    => array(
            'value1' => 'Choice 1',
            'value2' => 'Choice 2',
            'value3' => 'Choice 3',
        ),
    ));


    //  =============================
    //  = Image Upload              =
    //  =============================
    $wp_customize->add_setting('setting_image_upload_test', array(
        'default'           => get_stylesheet_directory_uri().'/library/images/customiser-example.jpg',
        'capability'        => 'edit_theme_options',
        'type'           => 'option',

    ));

    $wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'image_upload_test', array(
        'label'    => __('Image Upload Test', 'sesha'),
        'section'  => 'section_customise_options',
        'settings' => 'setting_image_upload_test',
    )));



    //  =============================
    //  = File Upload               =
    //  =============================
    $wp_customize->add_setting('setting_upload_test', array(
        'default'           => 'Some default text',
        'capability'        => 'edit_theme_options',
        'type'           	=> 'option'

    ));

    $wp_customize->add_control( new WP_Customize_Upload_Control($wp_customize, 'upload_test', array(
        'label'    => __('Upload Test', 'sesha'),
        'section'  => 'section_customise_options',
        'settings' => 'setting_upload_test'
    )));




    //  =============================
    //  = Color Picker              =
    //  =============================
    $wp_customize->add_setting('setting_link_color', array(
        'default'           => '000',
        'sanitize_callback' => 'sanitize_hex_color',
        'capability'        => 'edit_theme_options',
        'type'           => 'option',

    ));

    $wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'link_color', array(
        'label'    => __('Link Color', 'sesha'),
        'section'  => 'section_customise_options',
        'settings' => 'setting_link_color',
    )));




    //  =============================
    //  = Page Dropdown             =
    //  =============================
    $wp_customize->add_setting('setting_page_test', array(
        'capability'     => 'edit_theme_options',
        'type'           => 'option',

    ));

    $wp_customize->add_control('sesha_page_test', array(
        'label'      => __('Page Test', 'sesha'),
        'section'    => 'section_customise_options',
        'type'    	 => 'dropdown-pages',
        'settings'   => 'setting_page_test',
		'allow_addition' => true,
    ));

}

add_action('customize_register', 'sesha_customize_register_examples');