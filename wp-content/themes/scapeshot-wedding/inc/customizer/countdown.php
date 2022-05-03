<?php
/**
 * Countdown options
 *
 * @package Catch Wedding Pro
 */

/**
 * Add countdown options to theme options
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function scapeshot_countdown_options( $wp_customize ) {
	$wp_customize->add_section( 'scapeshot_countdown', array(
			'title' => esc_html__( 'Countdown', 'scapeshot-wedding' ),
			'panel' => 'scapeshot_theme_options',
		)
	);

	// Add color scheme setting and control.
	scapeshot_register_option( $wp_customize, array(
			'name'              => 'scapeshot_countdown_option',
			'default'           => 'disabled',
			'sanitize_callback' => 'scapeshot_sanitize_select',
			'choices'           => scapeshot_section_visibility_options(),
			'label'             => esc_html__( 'Enable on', 'scapeshot-wedding' ),
			'section'           => 'scapeshot_countdown',
			'type'              => 'select',
		)
	);

	scapeshot_register_option( $wp_customize, array(
			'name'              => 'scapeshot_countdown_bg_image',
			'sanitize_callback' => 'scapeshot_sanitize_image',
			'custom_control'    => 'WP_Customize_Image_Control',
			'active_callback'   => 'scapeshot_is_countdown_active',
			'label'             => esc_html__( 'Background Image', 'scapeshot-wedding' ),
			'section'           => 'scapeshot_countdown',
		)
	);

	scapeshot_register_option( $wp_customize, array(
			'name'              => 'scapeshot_countdown_section_title',
			'sanitize_callback' => 'sanitize_text_field',
			'active_callback'   => 'scapeshot_is_countdown_active',
			'label'             => esc_html__( 'Section Title', 'scapeshot-wedding' ),
			'default'           => esc_html__( 'Countdown', 'scapeshot-wedding' ),
			'section'           => 'scapeshot_countdown',
			'type'              => 'text',
		)
	);

	scapeshot_register_option( $wp_customize, array(
			'name'              => 'scapeshot_countdown_section_description',
			'sanitize_callback' => 'wp_kses_post',
			'active_callback'   => 'scapeshot_is_countdown_active',
			'label'             => esc_html__( 'Section Description', 'scapeshot-wedding' ),
			'section'           => 'scapeshot_countdown',
			'type'              => 'textarea',
		)
	);

	$date = new DateTime();

	// Add 10 Days to current Date.
	$date->add( new DateInterval( 'P10D' ) );
	$default =  $date->format( 'Y-m-d h:m:s' );

	scapeshot_register_option( $wp_customize, array(
			'name'              => 'scapeshot_countdown_end_date',
			'description'       => esc_html__( 'Must be after current date', 'scapeshot-wedding' ),
			'sanitize_callback' => 'scapeshot_sanitize_date_time',
			'active_callback'   => 'scapeshot_is_countdown_active',
			'default'           => $default,
			'label'             => esc_html__( 'End Date', 'scapeshot-wedding' ),
			'section'           => 'scapeshot_countdown',
			'type'              => 'date_time',
		)
	);
}
add_action( 'customize_register', 'scapeshot_countdown_options', 10 );

/** Active Callback Functions **/
if ( ! function_exists( 'scapeshot_is_countdown_active' ) ) :
	/**
	* Return true if countdown is active
	*
	* @since Catch Wedding Pro 1.0
	*/
	function scapeshot_is_countdown_active( $control ) {
		$enable = $control->manager->get_setting( 'scapeshot_countdown_option' )->value();

		return ( scapeshot_check_section( $enable ) );
	}
endif;

/**
 * Sanitize date time value
 * @param $input
 * @return string
 */
function scapeshot_sanitize_date_time( $input ) {
    $date = new DateTime( $input );
    
    return $date->format('Y-m-d h:m:s');
}

/**
 * Image sanitization callback example.
 *
 * Checks the image's file extension and mime type against a whitelist. If they're allowed,
 * send back the filename, otherwise, return the setting default.
 *
 * - Sanitization: image file extension
 * - Control: text, WP_Customize_Image_Control
 *
 * @see wp_check_filetype() https://developer.wordpress.org/reference/functions/wp_check_filetype/
 *
 * @param string               $image   Image filename.
 * @param WP_Customize_Setting $setting Setting instance.
 * @return string The image filename if the extension is allowed; otherwise, the setting default.
 */
function scapeshot_sanitize_image( $image, $setting ) {
    /*
     * Array of valid image file types.
     *
     * The array includes image mime types that are included in wp_get_mime_types()
     */
    $mimes = array(
        'jpg|jpeg|jpe' => 'image/jpeg',
        'gif'          => 'image/gif',
        'png'          => 'image/png',
        'bmp'          => 'image/bmp',
        'tif|tiff'     => 'image/tiff',
        'ico'          => 'image/x-icon'
    );
    // Return an array with file extension and mime_type.
    $file = wp_check_filetype( $image, $mimes );
    // If $image has a valid mime_type, return it; otherwise, return the default.
    return ( $file['ext'] ? $image : '' );
}
