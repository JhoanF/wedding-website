<?php
/**
 * Classic Wedding Theme Customizer
 *
 * @package Classic Wedding
 */

get_template_part('/inc/select/category-dropdown-custom-control');

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function classic_wedding_customize_register( $wp_customize ) {

	function classic_wedding_sanitize_dropdown_pages( $page_id, $setting ) {
  		$page_id = absint( $page_id );
  		return ( 'publish' == get_post_status( $page_id ) ? $page_id : $setting->default );
	}

	function classic_wedding_sanitize_checkbox( $checked ) {
		// Boolean check.
		return ( ( isset( $checked ) && true == $checked ) ? true : false );
	}

	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';

	$wp_customize->add_setting('classic_wedding_title_enable',array(
		'default' => true,
		'sanitize_callback' => 'classic_wedding_sanitize_checkbox',
	));
	$wp_customize->add_control( 'classic_wedding_title_enable', array(
	   'settings' => 'classic_wedding_title_enable',
	   'section'   => 'title_tagline',
	   'label'     => __('Enable Site Title','classic-wedding'),
	   'type'      => 'checkbox'
	));

	$wp_customize->add_setting('classic_wedding_tagline_enable',array(
		'default' => true,
		'sanitize_callback' => 'classic_wedding_sanitize_checkbox',
	));
	$wp_customize->add_control( 'classic_wedding_tagline_enable', array(
	   'settings' => 'classic_wedding_tagline_enable',
	   'section'   => 'title_tagline',
	   'label'     => __('Enable Site Tagline','classic-wedding'),
	   'type'      => 'checkbox'
	));

	//Theme Options
	$wp_customize->add_panel( 'classic_wedding_panel_area', array(
		'priority' => 10,
		'capability' => 'edit_theme_options',
		'title' => __( 'Theme Options Panel', 'classic-wedding' ),
	) );

	// Header Section
	$wp_customize->add_section('classic_wedding_header_section', array(
        'title' => __('Manage Header Section', 'classic-wedding'),
        'priority' => null,
		'panel' => 'classic_wedding_panel_area',
 	));

	$wp_customize->add_setting('classic_wedding_rsvp_text',array(
		'default' => '',
		'sanitize_callback' => 'sanitize_text_field',
		'capability' => 'edit_theme_options',
	));
	$wp_customize->add_control( 'classic_wedding_rsvp_text', array(
	   'settings' => 'classic_wedding_rsvp_text',
	   'section'   => 'classic_wedding_header_section',
	   'label' => __('Button Text', 'classic-wedding'),
	   'type'      => 'text'
	));

	$wp_customize->add_setting('classic_wedding_rsvp_link',array(
		'default' => '',
		'sanitize_callback' => 'esc_url_raw',
		'capability' => 'edit_theme_options',
	));
	$wp_customize->add_control( 'classic_wedding_rsvp_link', array(
	   'settings' => 'classic_wedding_rsvp_link',
	   'section'   => 'classic_wedding_header_section',
	   'label' => __('Button Link', 'classic-wedding'),
	   'type'      => 'url'
	));

	$wp_customize->add_setting('classic_wedding_header_text',array(
		'default' => '',
		'sanitize_callback' => 'sanitize_text_field',
		'capability' => 'edit_theme_options',
	));
	$wp_customize->add_control( 'classic_wedding_header_text', array(
	   'settings' => 'classic_wedding_header_text',
	   'section'   => 'classic_wedding_header_section',
	   'label' => __('Left Sidebar Text', 'classic-wedding'),
	   'type'      => 'text'
	));

	$wp_customize->add_setting('classic_wedding_preloader',array(
		'default' => true,
		'sanitize_callback' => 'classic_wedding_sanitize_checkbox',
	));	 

	$wp_customize->add_control( 'classic_wedding_preloader', array(
	   'section'   => 'classic_wedding_header_section',
	   'label'	=> __('Check to Show preloader','classic-wedding'),
	   'type'      => 'checkbox'
 	));

	// Home Category Dropdown Section
	$wp_customize->add_section('classic_wedding_one_cols_section',array(
		'title'	=> __('Manage Slider','classic-wedding'),
		'description'	=> __('Select Category from the Dropdowns for slider, Also use the given image dimension (1200 x 450).','classic-wedding'),
		'priority'	=> null,
		'panel' => 'classic_wedding_panel_area'
	));

	$wp_customize->add_setting( 'classic_wedding_slidersection', array(
		'default'	=> '0',	
		'sanitize_callback'	=> 'absint'
	) );
	$wp_customize->add_control( new Classic_Wedding_Category_Dropdown_Custom_Control( $wp_customize, 'classic_wedding_slidersection', array(
		'section' => 'classic_wedding_one_cols_section',
		'label' => __('Select the post category to show slider', 'classic-wedding'),
		'settings'   => 'classic_wedding_slidersection',
	) ) );

	$wp_customize->add_setting( 'classic_wedding_slider_count', array(
	  	'capability' => 'edit_theme_options',
	  	'sanitize_callback' => 'classic_wedding_sanitize_number_absint',
	  	'default' => 1,
	) );
	$wp_customize->add_control( 'classic_wedding_slider_count', array(
	  	'settings' => 'classic_wedding_slider_count',
	  	'type' => 'number',
	  	'section' => 'classic_wedding_one_cols_section',
	  	'label' => __( 'Number Of Slide To Show','classic-wedding'),
	) );

	$wp_customize->add_setting('classic_wedding_button_text',array(
		'default' => 'Book Now',
		'sanitize_callback' => 'sanitize_text_field',
		'capability' => 'edit_theme_options',
	));
	$wp_customize->add_control( 'classic_wedding_button_text', array(
	   'settings' => 'classic_wedding_button_text',
	   'section'   => 'classic_wedding_one_cols_section',
	   'label' => __('Add Button Text', 'classic-wedding'),
	   'type'      => 'text'
	));
	
	$wp_customize->add_setting('classic_wedding_hide_categorysec',array(
		'default' => false,
		'sanitize_callback' => 'classic_wedding_sanitize_checkbox',
		'capability' => 'edit_theme_options',
	));
	$wp_customize->add_control( 'classic_wedding_hide_categorysec', array(
	   'settings' => 'classic_wedding_hide_categorysec',
	   'section'   => 'classic_wedding_one_cols_section',
	   'label'     => __('Check To Enable This Section','classic-wedding'),
	   'type'      => 'checkbox'
	));
	
	// About us
	$wp_customize->add_section('classic_wedding_two_cols_section',array(
		'title'	=> __('Manage About us Section','classic-wedding'),
		'description'	=> __('Select Page from the Dropdown for about us, Also use the given image dimension (470 x 600).','classic-wedding'),
		'priority'	=> null,
		'panel' => 'classic_wedding_panel_area'
	));

	$wp_customize->add_setting('classic_wedding_pgboxes_title',array(
		'sanitize_callback' => 'sanitize_text_field',
	));
	$wp_customize->add_control( 'classic_wedding_pgboxes_title', array(
	   'section'   => 'classic_wedding_two_cols_section',
	   'label'	=> __('Section Title','classic-wedding'),
	   'type'      => 'text',
	   'priority' => null,
    ));
	
	$wp_customize->add_setting('classic_wedding_about_us',array(
		'default'	=> '0',
		'capability' => 'edit_theme_options',
		'sanitize_callback'	=> 'classic_wedding_sanitize_dropdown_pages'
	));
	$wp_customize->add_control(	'classic_wedding_about_us',array(
		'type' => 'dropdown-pages',
		'label' => __('Select the page to show about us section', 'classic-wedding'),
		'section' => 'classic_wedding_two_cols_section',
	));

	// Footer Section 
	$wp_customize->add_section('classic_wedding_footer', array(
		'title'	=> __('Manage Footer Section','classic-wedding'),
		'priority'	=> null,
		'panel' => 'classic_wedding_panel_area',
	));

	$wp_customize->add_setting('classic_wedding_copyright_line',array(
		'sanitize_callback' => 'sanitize_text_field',
	));	
	$wp_customize->add_control( 'classic_wedding_copyright_line', array(
	   'section' 	=> 'classic_wedding_footer',
	   'label'	 	=> __('Copyright Line','classic-wedding'),
	   'type'    	=> 'text',
	   'priority' 	=> null,
    ));

    $wp_customize->add_setting('classic_wedding_color_scheme_gradiant1',array(
		'default' => '#ceb08e',
		'sanitize_callback' => 'sanitize_hex_color',
	));

    $wp_customize->add_control( 
	    new WP_Customize_Color_Control( 
	    $wp_customize, 
	    'classic_wedding_color_scheme_gradiant1', 
	    array(
	        'label'      => __( 'Color Scheme', 'classic-wedding' ),
	        'section'    => 'colors',
	        'settings'   => 'classic_wedding_color_scheme_gradiant1',
	    ) )
	);

    // Google Fonts
    $wp_customize->add_section( 'classic_wedding_google_fonts_section', array(
		'title'       => __( 'Google Fonts', 'classic-wedding' ),
		'priority'    => 24,
	) );

	$font_choices = array(
		'Kaushan Script:' => 'Kaushan Script',
		'Emilys Candy:' => 'Emilys Candy',
		'Poppins:0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900' => 'Poppins',
		'Source Sans Pro:400,700,400italic,700italic' => 'Source Sans Pro',
		'Open Sans:400italic,700italic,400,700' => 'Open Sans',
		'Oswald:400,700' => 'Oswald',
		'Playfair Display:400,700,400italic' => 'Playfair Display',
		'Montserrat:400,700' => 'Montserrat',
		'Raleway:400,700' => 'Raleway',
		'Droid Sans:400,700' => 'Droid Sans',
		'Lato:400,700,400italic,700italic' => 'Lato',
		'Arvo:400,700,400italic,700italic' => 'Arvo',
		'Lora:400,700,400italic,700italic' => 'Lora',
		'Merriweather:400,300italic,300,400italic,700,700italic' => 'Merriweather',
		'Oxygen:400,300,700' => 'Oxygen',
		'PT Serif:400,700' => 'PT Serif',
		'PT Sans:400,700,400italic,700italic' => 'PT Sans',
		'PT Sans Narrow:400,700' => 'PT Sans Narrow',
		'Cabin:400,700,400italic' => 'Cabin',
		'Fjalla One:400' => 'Fjalla One',
		'Francois One:400' => 'Francois One',
		'Josefin Sans:400,300,600,700' => 'Josefin Sans',
		'Libre Baskerville:400,400italic,700' => 'Libre Baskerville',
		'Arimo:400,700,400italic,700italic' => 'Arimo',
		'Ubuntu:400,700,400italic,700italic' => 'Ubuntu',
		'Bitter:400,700,400italic' => 'Bitter',
		'Droid Serif:400,700,400italic,700italic' => 'Droid Serif',
		'Roboto:400,400italic,700,700italic' => 'Roboto',
		'Open Sans Condensed:700,300italic,300' => 'Open Sans Condensed',
		'Roboto Condensed:400italic,700italic,400,700' => 'Roboto Condensed',
		'Roboto Slab:400,700' => 'Roboto Slab',
		'Yanone Kaffeesatz:400,700' => 'Yanone Kaffeesatz',
		'Rokkitt:400' => 'Rokkitt',
	);

	$wp_customize->add_setting( 'classic_wedding_headings_fonts', array(
		'sanitize_callback' => 'classic_wedding_sanitize_fonts',
	));
	$wp_customize->add_control( 'classic_wedding_headings_fonts', array(
		'type' => 'select',
		'description' => __('Select your desired font for the headings.', 'classic-wedding'),
		'section' => 'classic_wedding_google_fonts_section',
		'choices' => $font_choices
	));

	$wp_customize->add_setting( 'classic_wedding_body_fonts', array(
		'sanitize_callback' => 'classic_wedding_sanitize_fonts'
	));
	$wp_customize->add_control( 'classic_wedding_body_fonts', array(
		'type' => 'select',
		'description' => __( 'Select your desired font for the body.', 'classic-wedding' ),
		'section' => 'classic_wedding_google_fonts_section',
		'choices' => $font_choices
	));
}
add_action( 'customize_register', 'classic_wedding_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function classic_wedding_customize_preview_js() {
	wp_enqueue_script( 'classic_wedding_customizer', esc_url(get_template_directory_uri()) . '/js/customize-preview.js', array( 'customize-preview' ), '20161510', true );
}
add_action( 'customize_preview_init', 'classic_wedding_customize_preview_js' );